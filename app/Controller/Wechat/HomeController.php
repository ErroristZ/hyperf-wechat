<?php

declare(strict_types=1);

namespace App\Controller\Wechat;

use App\Controller\AbstractController;
use App\Model\User;
use App\Request\Wechat\UserResquest;
use Phper666\JWTAuth\JWT;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

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

    public function login(UserResquest $request, ResponseInterface $response, JWT $jwt): Psr7ResponseInterface
    {
        $data=[];
        if (true === User::checkUser($request)) {
            $user = User::query()->where('name', $request->input('name'))->first()->toArray();
            $data['token'] = (string)$jwt->getToken(['uid' => $user['id'], 'username' => $user['name']]);
            return $response->json(['code' => 200, 'token' => $data])->withStatus(200);
        } else {
            return $response->json(['message' => '账户名或密码错误', 'code' => 400])->withStatus(405);
        }
    }
}