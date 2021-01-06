<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Model\ArticleCategory;
use App\Request\Admin\System\ArticleCategoryResquest;
use Hyperf\HttpServer\Contract\ResponseInterface;

class ArticleCategoryController extends AbstractController
{
    public function list(ResponseInterface $response)
    {
        $data = $this->getPaginateData(ArticleCategory::getList([], $this->getPageSize(), ['*'], 'id', 'DESC'));
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    public function create(ResponseInterface $response)
    {
        $data = ArticleCategory::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '分类不存在', 'result' => $data])->withStatus(403);
        }
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    public function update(ArticleCategoryResquest $request, ResponseInterface $response)
    {
        $data = ArticleCategory::getFirstById($request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '分类不存在', 'result' => $data])->withStatus(403);
        }
        $data->update($request->validated());
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }

    public function delete(ResponseInterface $response)
    {
        $data = ArticleCategory::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '分类不存在', 'result' => $data])->withStatus(403);
        }
        $data->delete();
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }
}