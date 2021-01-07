<?php

declare (strict_types=1);
namespace App\Model;


use Hyperf\Database\Model\SoftDeletes;

/**
 * @property int $id 
 * @property string $name 
 * @property string $code 
 * @property int $sort 
 * @property int $status 
 * @property int $create_time 
 * @property int $update_time 
 * @property int $delete_time 
 */
class Post extends ModelBase implements ModelInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post';

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
    protected $fillable = ['id', 'name', 'code', 'sort', 'status', 'create_time', 'update_time', 'delete_time'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'sort' => 'integer', 'status' => 'integer', 'create_time' => 'integer', 'update_time' => 'integer', 'delete_time' => 'integer'];
}