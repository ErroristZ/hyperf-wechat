<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Model\User;
use App\Service\Admin\UserService;
use App\Request\Admin\System\UserResquest;
use Hyperf\HttpServer\Contract\ResponseInterface;

class UserController extends AbstractController
{
    public function list()
    {

    }

    /**
     * @param UserResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create(UserResquest $request, ResponseInterface $response)
    {
        if (UserService::create($request) === false) {
            return $response->json(['message' => '操作失败','code' => 50015])->withStatus(403);
        }

        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }

    /**
     * @param UserResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(UserResquest $request, ResponseInterface $response)
    {
        if (UserService::update($request) === false) {
            return $response->json(['message' => '操作失败','code' => 50015])->withStatus(403);
        }

        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }

    /**
     * @param UserResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(UserResquest $request, ResponseInterface $response)
    {
        if (UserService::delete($request) === false) {
            return $response->json(['message' => '操作失败','code' => 50015])->withStatus(403);
        }

        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }

    public function info()
    {

    }

    public function current()
    {

    }

    public function updateCurrent()
    {

    }

    public function avatar()
    {

    }

    public function resetPassword()
    {

    }

    public function data()
    {

    }

    public function getInfo()
    {

    }
}