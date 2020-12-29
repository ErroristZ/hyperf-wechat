<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Model\Article;
use App\Request\Admin\System\ArticleResquest;
use Phper666\JWTAuth\JWT;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class PermissionController extends AbstractController
{
    public function list(){
        $query = Article::query()->with('roles');
        return $response->json(['message' => '操作成功','code' => 200, 'result' => $query])->withStatus(200);
    }
}