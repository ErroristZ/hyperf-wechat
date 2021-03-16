<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Model\ArticleCategory;
use App\Request\Admin\System\ArticleCategoryResquest;
use Hyperf\HttpServer\Contract\ResponseInterface;
use App\Service\Admin\ArticleCategoryService;

class ArticleCategoryController extends AbstractController
{
    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function list(ResponseInterface $response)
    {
        $data = $this->getPaginateData(ArticleCategory::getList([], $this->getPageSize(), ['*'], 'id', 'DESC'));
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param ArticleCategoryResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create(ArticleCategoryResquest $request, ResponseInterface $response)
    {
        if (ArticleCategoryService::create($request) === false) {
            return $response->json(['message' => '操作失败','code' => 50015])->withStatus(200);
        }
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }

    /**
     * @param ArticleCategoryResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
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

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function delete(ResponseInterface $response)
    {
        $data = ArticleCategory::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '分类不存在', 'result' => $data])->withStatus(403);
        }
        $data->delete();
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }
}