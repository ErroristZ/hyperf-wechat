<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Model\User;
use App\Request\Admin\UserResquest;
use Phper666\JWTAuth\JWT;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

class AuthController extends AbstractController
{

    public function login(UserResquest $request, ResponseInterface $response, JWT $jwt): Psr7ResponseInterface
    {
        $data=[];
        if (true === User::checkUser($request)) {
            $user = User::query()->where('name', $request->input('name'))->first()->toArray();
            $token = (string)$jwt->getToken(['uid' => $user['id'], 'username' => $user['name']]);

            $data = [
                'token' => $token,
                'token_type' => 'Header',
                'expires_in' => $jwt->getTTL(),
                'refresh_in' => $jwt->getTTL(),
            ];
            return $response->json(['message' => '操作成功','code' => 200, 'token' => $data])->withStatus(200);
        } else {
            return $response->json(['message' => '账户名或密码错误', 'code' => 400])->withStatus(405);
        }
    }

    public function refreshToken( ResponseInterface $response, JWT $jwt): Psr7ResponseInterface
    {
        $token = (string)$jwt->refreshToken();
        $data = [
            'token' => $token,
            'token_type' => 'Header',
            'expires_in' => $jwt->getTTL(),
            'refresh_in' => $jwt->getTTL(),
        ];
        return $response->json(['message' => '操作成功','code' => 200, 'result' => $data])->withStatus(200);
    }

    public function logout( ResponseInterface $response, JWT $jwt): Psr7ResponseInterface
    {
        $jwt->logout();
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }
}