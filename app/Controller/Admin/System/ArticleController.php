<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Model\Article;
use App\Request\Admin\System\ArticleResquest;
use App\Service\Admin\ArticleService;
use Hyperf\HttpServer\Contract\ResponseInterface;

class ArticleController extends AbstractController
{
    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function list(ResponseInterface $response)
    {
        $data = $this->getPaginateData(Article::getList([], $this->getPageSize(), ['*'], 'id', 'DESC'));
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function info(ResponseInterface $response)
    {
        $data = Article::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '文章不存在', 'result' => $data])->withStatus(403);
        }
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function delete(ResponseInterface $response)
    {
        $data = Article::getFirstById($this->request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '文章不存在', 'result' => $data])->withStatus(403);
        }
        $data->delete();
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }

    /**
     * @param ArticleResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create(ArticleResquest $request, ResponseInterface $response)
    {

        if (ArticleService::create($request) === false) {
            return $response->json(['message' => '操作失败','code' => 50015])->withStatus(200);
        }

        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }

    /**
     * @param ArticleResquest $request
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(ArticleResquest $request, ResponseInterface $response)
    {
        $data = Article::getFirstById($request->route('id'));
        if (!$data)
        {
            return $response->json(['message' => '文章不存在', 'result' => $data])->withStatus(403);
        }
        $data->update($request->validated());
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }
}