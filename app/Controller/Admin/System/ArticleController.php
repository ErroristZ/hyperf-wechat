<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Service\Admin\ArticleService;
use App\Model\Article;
use App\Request\Admin\System\ArticleResquest;
use Phper666\JWTAuth\JWT;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class ArticleController extends AbstractController
{

    public function list(ResponseInterface $response){
        $data = $this->getPaginateData(Article::getList([], $this->getPageSize(), ['*'], 'id', 'DESC'));
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    public function info(ResponseInterface $response)
    {
        $data = Article::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '文章不存在', 'result' => $data])->withStatus(403);
        }
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    public function delete(ResponseInterface $response)
    {
        $data = Article::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '文章不存在', 'result' => $data])->withStatus(403);
        }
        $data->delete();
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    public function create(ResponseInterface $response)
    {
        $data = Article::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '文章不存在', 'result' => $data])->withStatus(403);
        }
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    public function update(ArticleResquest $request, ResponseInterface $response)
    {
        $data = Article::getFirstById($request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '文章不存在', 'result' => $data])->withStatus(403);
        }
        $data->update($request->validated());
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }
}