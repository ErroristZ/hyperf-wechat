<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Model\Role;
use App\Request\Admin\System\RoleResquest;
use Hyperf\HttpServer\Contract\ResponseInterface;

class RoleController extends AbstractController
{

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function list(ResponseInterface $response)
    {
        $data = $this->getPaginateData(Role::getList([], $this->getPageSize(), ['*'], 'id', 'DESC'));
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function all(ResponseInterface $response)
    {
        $data = $this->getPaginateData(Role::getList([], $this->getPageSize(), ['*'], 'id', 'DESC'));
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create(ResponseInterface $response)
    {
        $data = Role::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '角色不存在', 'result' => $data])->withStatus(403);
        }
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param RoleResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(RoleResquest $request, ResponseInterface $response)
    {
        $data = Role::getFirstById($request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '角色不存在', 'result' => $data])->withStatus(403);
        }
        $data->update($request->validated());
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function delete(ResponseInterface $response)
    {
        $data = Role::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '角色不存在', 'result' => $data])->withStatus(403);
        }
        $data->delete();
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }

    /**
     * @param RoleResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function mode(RoleResquest $request, ResponseInterface $response)
    {
        $data = Role::getFirstById($request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '角色不存在', 'result' => $data])->withStatus(403);
        }
        $data->update($request->validated());
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }
}