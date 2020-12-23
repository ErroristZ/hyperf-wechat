<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    'http' => [
        App\Middleware\CorsMiddleware::class,
        //验证组件
        Hyperf\Validation\Middleware\ValidationMiddleware::class,
//        Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class,//强制全局路由验证
    ],
];
