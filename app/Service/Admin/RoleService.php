<?php

declare(strict_types=1);

namespace App\Service\Admin;

use App\Model\Role;
use Hyperf\HttpServer\Contract\RequestInterface;

class RoleService
{

    /**
     * @param RequestInterface $request
     * @return bool
     */
    public static function create(RequestInterface $request): bool
    {
        $data = $request->all();

        //添加
        if (!$info = Role::query()->create($data)) {
            return false;
        }

        return true;
    }
}