<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\Database\Model\SoftDeletes;
use Hyperf\HttpServer\Contract\RequestInterface;
/**
 * @property int $id 
 * @property string $name 
 * @property string $password 
 * @property string $hash 
 * @property string $nickname 
 * @property int $dept_id 
 * @property int $status 
 * @property string $avatar 
 * @property string $email 
 * @property int $create_time 
 * @property int $update_time 
 * @property int $delete_time 
 */
class User extends ModelBase implements ModelInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    use SoftDeletes;

    protected $dateFormat = 'U';

    const CREATED_AT = 'create_time';

    const UPDATED_AT = 'update_time';

    //必须为null
    const DELETED_AT = 'delete_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'password', 'hash', 'nickname',
        'dept_id', 'status', 'avatar', 'email', 'create_time', 'update_time', 'delete_time'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'dept_id' => 'integer', 'status' => 'integer', 'create_time' => 'integer', 'update_time' => 'integer', 'delete_time' => 'integer'];

    protected $hidden=['password'];

    /**
     * @param  RequestInterface $request
     */
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