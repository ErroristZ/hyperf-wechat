<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Model\Post;
use App\Request\Admin\System\PostResquest;
use Hyperf\HttpServer\Contract\ResponseInterface;

class PostController extends AbstractController
{
    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function all(ResponseInterface $response)
    {
        $data = $this->getPaginateData(Post::getList([], $this->getPageSize(), ['*'], 'id', 'DESC'));
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create(ResponseInterface $response)
    {
        $data = Post::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '岗位不存在', 'result' => $data])->withStatus(403);
        }
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param PostResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(PostResquest $request, ResponseInterface $response)
    {
        $data = Post::getFirstById($request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '岗位不存在', 'result' => $data])->withStatus(403);
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
        $data = Post::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '岗位不存在', 'result' => $data])->withStatus(403);
        }
        $data->delete();
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }
}