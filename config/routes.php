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
use Hyperf\HttpServer\Router\Router;

Router::get('/Wechat/index', 'App\Controller\Wechat\HomeController@index');
Router::get('/index', 'App\Controller\IndexController@index');
Router::post('/login', 'App\Controller\IndexController@login');

Router::addGroup('/v1', function () {
    //刷新token
    Router::get('/refresh-token', 'App\Controller\IndexController@refreshToken');
    //退出登录
    Router::get('/logout', 'App\Controller\IndexController@logout');
    //获取信息
    Router::get('/data', 'App\Controller\IndexController@getData');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);