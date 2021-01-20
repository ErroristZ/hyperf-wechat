<?php

declare(strict_types=1);

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

//后端登录
Router::post('/login', 'App\Controller\Admin\AuthController@login');
Router::addGroup('/auth', function () {
    Router::post('/login', 'App\Controller\Admin\AuthController@login');
});

Router::addRoute(['GET', 'POST', 'HEAD'], '/wechat/index', 'App\Controller\Wechat\HomeController@serve');
Router::addRoute(['GET', 'POST', 'HEAD'], '/wechat/getWxPic', 'App\Controller\Wechat\HomeController@getWxPic');

//后端路由
Router::addGroup('/auth', function () {
    Router::get('/refresh_token', 'App\Controller\Admin\AuthController@refreshToken');
    Router::post('/logout', 'App\Controller\Admin\AuthController@logout');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);

//后端规则
Router::addGroup('/permission', function () {
    Router::get('', 'App\Controller\Admin\System\PermissionController@list');
    Router::post('', 'App\Controller\Admin\System\PermissionController@create');
    Router::put('/{id}', 'App\Controller\Admin\System\PermissionController@update');
    Router::delete('/{id}', 'App\Controller\Admin\System\PermissionController@delete');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);

//后端文章
Router::addGroup('/article', function () {
    //分类列表
    Router::get('/category', 'App\Controller\Admin\System\ArticleCategoryController@list');
    Router::post('/category', 'App\Controller\Admin\System\ArticleCategoryController@create');
    Router::put('/category/{id}', 'App\Controller\Admin\System\ArticleCategoryController@update');
    Router::delete('/category/{id}', 'App\Controller\Admin\System\ArticleCategoryController@delete');

    //文章列表
    Router::get('', 'App\Controller\Admin\System\ArticleController@list');
    Router::post('', 'App\Controller\Admin\System\ArticleController@create');
    Router::get('/{id}', 'App\Controller\Admin\System\ArticleController@info');
    Router::delete('/{id}', 'App\Controller\Admin\System\ArticleController@delete');
    Router::put('/{id}', 'App\Controller\Admin\System\ArticleController@update');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);

//管理员日志
Router::addGroup('/log', function () {
    //管理员日志列表
    Router::get('/acount', 'App\Controller\Admin\Log\AccountLogController@list');
    Router::delete('/acount', 'App\Controller\Admin\Log\AccountLogController@delete');
    Router::get('/db', 'App\Controller\Admin\Log\DataBaseLogController@list');
    Router::delete('/db', 'App\Controller\Admin\Log\DataBaseLogController@delete');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);


//系统管理
Router::addGroup('/system', function () {
    //部门列表
    Router::get('/dept', 'App\Controller\Admin\System\DeptController@list');
    Router::post('/dept', 'App\Controller\Admin\System\DeptController@create');
    Router::put('/dept/{id}', 'App\Controller\Admin\System\DeptController@update');
    Router::delete('/dept/{id}', 'App\Controller\Admin\System\DeptController@delete');

    //岗位列表
    Router::get('/post', 'App\Controller\Admin\System\PostController@all');
    Router::post('/post', 'App\Controller\Admin\System\PostController@create');
    Router::put('/post/{id}', 'App\Controller\Admin\System\PostController@update');
    Router::delete('/post/{id}', 'App\Controller\Admin\System\PostController@delete');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);


//角色管理
Router::addGroup('/role', function () {
    //角色列表
    Router::get('', 'App\Controller\Admin\System\RoleController@list');
    Router::post('', 'App\Controller\Admin\System\RoleController@create');
    Router::get('/all', 'App\Controller\Admin\System\RoleController@all');
    Router::put('/{id}', 'App\Controller\Admin\System\RoleController@update');
    Router::delete('/{id}/mode', 'App\Controller\Admin\System\RoleController@mode');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);

//用户管理
Router::addGroup('/user', function () {
    //用户列表
    Router::get('/data', 'App\Controller\Admin\System\UserController@data');
    Router::get('/current', 'App\Controller\Admin\System\UserController@current');
    Router::put('/current', 'App\Controller\Admin\System\UserController@updateCurrent');
    Router::post('/avatar', 'App\Controller\Admin\System\UserController@avatar');
    Router::put('/reset-password', 'App\Controller\Admin\System\UserController@resetPassword');
    Router::get('', 'App\Controller\Admin\System\UserController@list');
    Router::post('', 'App\Controller\Admin\System\UserController@create');
    Router::get('/info', 'App\Controller\Admin\System\UserController@info');
    Router::put('/{id}', 'App\Controller\Admin\System\UserController@update');
    Router::delete('/{id}', 'App\Controller\Admin\System\UserController@delete');
    Router::get('/{id}', 'App\Controller\Admin\System\UserController@getInfo');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);


Router::addGroup('/v1', function () {
    //刷新token
    Router::get('/refresh-token', 'App\Controller\IndexController@refreshToken');
    //退出登录
    Router::get('/logout', 'App\Controller\IndexController@logout');
    //获取信息
    Router::get('/data', 'App\Controller\IndexController@getData');
}, ['middleware' => [Phper666\JWTAuth\Middleware\JWTAuthMiddleware::class]]);