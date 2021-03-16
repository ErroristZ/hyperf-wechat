<?php

declare(strict_types=1);

namespace App\Service\Admin;

use App\Model\Dept;
use Hyperf\HttpServer\Contract\RequestInterface;

class DeptService
{
    /**
     * @param RequestInterface $request
     * @return bool
     */
    public static function create(RequestInterface $request): bool
    {
        $Info = $request->all();

        $data['status'] = $Info['status'];
        $data['name'] = $Info['name'];
        $data['pid'] = $Info['pid'];

        //添加
        if (!$info = Dept::query()->create($data)) {
            return false;
        }

        return true;
    }
}