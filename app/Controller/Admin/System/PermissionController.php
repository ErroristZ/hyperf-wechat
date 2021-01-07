<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Model\Permission;
use App\Request\Admin\System\PermissionResquest;
use Hyperf\HttpServer\Contract\ResponseInterface;

class PermissionController extends AbstractController
{    /**
 * @param ResponseInterface $response
 * @return \Psr\Http\Message\ResponseInterface
 */
    public function list(ResponseInterface $response)
    {
        $data = $this->getPaginateData(Permission::getList([], $this->getPageSize(), ['*'], 'id', 'DESC'));
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create(ResponseInterface $response)
    {
        $data = Permission::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '规则不存在', 'result' => $data])->withStatus(403);
        }
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param PermissionResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(PermissionResquest $request, ResponseInterface $response)
    {
        $data = Permission::getFirstById($request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '规则不存在', 'result' => $data])->withStatus(403);
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
        $data = Permission::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '规则不存在', 'result' => $data])->withStatus(403);
        }
        $data->delete();
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }
}