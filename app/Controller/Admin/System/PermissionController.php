<?php

declare(strict_types=1);

namespace App\Controller\Admin\System;

use App\Controller\AbstractController;
use App\Model\User;
use App\Request\Admin\System\PermissionResquest;
use Phper666\JWTAuth\JWT;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

class PermissionController extends AbstractController
{

    public function list(PermissionResquest $request, ResponseInterface $response, JWT $jwt): Psr7ResponseInterface
    {

    }
}