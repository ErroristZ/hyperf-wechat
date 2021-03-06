<?php

declare(strict_types=1);

namespace App\Service\Admin;

use App\Model\Article;
use Hyperf\HttpServer\Contract\RequestInterface;

class ArticleService
{
    /**
     * @param RequestInterface $request
     * @return bool
     */
    public static function create(RequestInterface $request): bool
    {
        $Info = $request->all();

        $data['title'] = $Info['title'];
        $data['image'] = $Info['image'];
        $data['category_id'] = $Info['category_id'];
        $data['content'] = $Info['content'];
        $data['top'] = $Info['top'];

        //添加
        if (!$info = Article::query()->create($data)) {
            return false;
        }

        return true;
    }
}