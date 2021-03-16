<?php

declare(strict_types=1);

namespace App\Service\Admin;

use App\Model\ArticleCategory;
use Hyperf\HttpServer\Contract\RequestInterface;

class ArticleCategoryService
{
    /**
     * @param RequestInterface $request
     * @return bool
     */
    public static function create(RequestInterface $request): bool
    {
        $Info = $request->all();

        $data['disable'] = $Info['disable'];
        $data['name'] = $Info['name'];
        $data['pid'] = $Info['pid'];

        //添加
        if (!$info = ArticleCategory::query()->create($data)) {
            return false;
        }

        return true;
    }
}