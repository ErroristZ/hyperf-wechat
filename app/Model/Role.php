<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\Database\Model\SoftDeletes;
use Hyperf\HttpServer\Contract\RequestInterface;
/**
 * @property int $id 
 * @property string $name 
 * @property string $title 
 * @property int $pid 
 * @property int $mode 
 * @property int $status 
 * @property int $create_time 
 * @property int $update_time 
 * @property int $delete_time 
 */
class Role extends ModelBase implements ModelInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role';

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
    protected $fillable = ['id', 'pid', 'name', 'title', 'pid', 'mode', 'status', 'create_time', 'update_time', 'delete_time'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'pid' => 'integer', 'mode' => 'integer', 'status' => 'integer', 'create_time' => 'integer', 'update_time' => 'integer', 'delete_time' => 'integer'];

    /**
     * @param RequestInterface $request
     * @return bool
     */
    public static function create($request)
    {
        $data = $request->all();

        //添加
        if (!$info = Role::query()->create($data)) {
            return false;
        }

        return true;
    }
}