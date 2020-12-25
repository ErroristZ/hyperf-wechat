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

//后端登录
Router::post('/login', 'App\Controller\Admin\AuthController@login');
Router::addGroup('/auth', function () {
    Router::post('/login', 'App\Controller\Admin\AuthController@login');
});

//后端路由
Router::addGroup('/auth', function () {
    Router::get('/refresh_token', 'App\Controller\Admin\AuthController@refreshToken');
    Router::post('/logout', 'App\Controller\Admin\AuthController@logout');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);

//后端规则
Router::addGroup('/permission', function () {
    Router::get('/', 'App\Controller\Admin\System\Permission@list');
    Router::post('/', 'App\Controller\Admin\System\Permission@create');
    Router::put('/{id}', 'App\Controller\Admin\System\Permission@update');
    Router::delete('/{id}', 'App\Controller\Admin\System\Permission@delete');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);

//后端文章
Router::addGroup('/article', function () {
    Router::get('/', 'App\Controller\Admin\System\Article@list');
    Router::post('/', 'App\Controller\Admin\System\Article@create');
    Router::get('/{id}', 'App\Controller\Admin\System\Article@info');
    Router::delete('/{id}', 'App\Controller\Admin\System\Article@delete');
    Router::put('/{id}', 'App\Controller\Admin\System\Article@update');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);



Router::addGroup('/v1', function () {
    //刷新token
    Router::get('/refresh-token', 'App\Controller\IndexController@refreshToken');
    //退出登录
    Router::get('/logout', 'App\Controller\IndexController@logout');
    //获取信息
    Router::get('/data', 'App\Controller\IndexController@getData');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);