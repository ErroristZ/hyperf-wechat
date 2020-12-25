<?php

declare (strict_types=1);

namespace App\Model;

//use Donjan\Permission\Traits\HasRoles;
use Hyperf\DbConnection\Model\Model;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 */
class User extends Model
{
//    use HasRoles;

    protected $table = 'user';

    protected $fillable = ['id', 'name', 'password', 'hash', 'nickname',
        'dept_id', 'status', 'avatar', 'email', 'create_time', 'update_time', 'delete_time'
    ];

    protected $casts = [];

    protected $hidden=['password'];

    public static function checkUser($request)
    {
        $userInfo = $request->all();
        if (!$user = User::query()->where('name', $userInfo['name'])
            ->orWhere('email', $userInfo['name'])->first()) {
            return false;
        }
        if (false === password_verify($userInfo['password'], $user->password)) {
            return false;
        }
        return true;
    }
}