<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Model\Article;

class PermissionController extends AbstractController
{
    public function list(){
        $query = Article::query()->with('roles');
        return $response->json(['message' => '操作成功','code' => 200, 'result' => $query])->withStatus(200);
    }
}