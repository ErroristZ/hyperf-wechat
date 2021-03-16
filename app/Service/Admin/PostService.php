<?php

declare(strict_types=1);

namespace App\Service\Admin;

use App\Model\Post;
use Hyperf\HttpServer\Contract\RequestInterface;

class PostService
{

    /**
     * @param RequestInterface $request
     * @return bool
     */
    public static function create(RequestInterface $request): bool
    {
        $data = $request->all();

        //添加
        if (!$info = Post::query()->create($data)) {
            return false;
        }

        return true;
    }
}