<?php

declare(strict_types=1);

namespace App\Controller\Wechat;

use App\Controller\AbstractController;
use EasyWeChat\Kernel\Exceptions\BadRequestException;
use EasyWeChat\Kernel\Exceptions\InvalidArgumentException;
use EasyWeChat\Kernel\Exceptions\InvalidConfigException;
use Naixiaoxin\HyperfWechat\EasyWechat;
use Naixiaoxin\HyperfWechat\Helper;
use ReflectionException;

class HomeController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Wechat');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     * @throws BadRequestException
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     * @throws ReflectionException
     */
    public function serve()
    {
        $app = EasyWechat::officialAccount();

        $app->server->push(function ($message) {
        switch ($message['MsgType']) {
            case 'event':
                return '收到事件消息';
                break;
            case 'text':
                if ($message['Content'] === '你好'){
                    return "你也好！";
                }
                return "欢迎关注 六三二四！";
                break;
            case 'image':
                return '这是一张图片';
                break;
            case 'voice':
                return '收到语音消息';
                break;
            case 'video':
                return '收到视频消息';
                break;
            case 'location':
                return '收到坐标消息';
                break;
            case 'link':
                return '收到链接消息';
                break;
            case 'file':
                return '收到文件消息';
                break;
            default:
                return '收到其它消息';
                break;
                }
        });

        $response = $app->server->serve();

        // 一定要用Helper::Response去转换
        return Helper::Response($response);
    }

    /**
     * 获取二维码图片(订阅号开通不了接口)
     *
     * @return string
     * @throws BadRequestException
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     * @throws ReflectionException
     */
    public function getWxPic()
    {
        $app = EasyWechat::officialAccount();

        $result = $app->qrcode->temporary('foo', 6 * 24 * 3600);

        return $result;
    }
}