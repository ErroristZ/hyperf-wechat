<?php

declare(strict_types=1);

namespace App\Service\Admin;

use App\Model\Permission;
use Hyperf\HttpServer\Contract\RequestInterface;

class PermissionService
{

    /**
     * @param RequestInterface $request
     * @return bool
     */
    public static function create(RequestInterface $request): bool
    {
        $data = $request->all();

        //添加
        if (!$info = Permission::query()->create($data)) {
            return false;
        }

        return true;
    }
}