<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\Database\Model\SoftDeletes;

/**
 * @property int $id 
 * @property string $name 
 * @property string $title 
 * @property int $pid 
 * @property string $type 
 * @property int $status 
 * @property string $path 
 * @property string $redirect 
 * @property string $component 
 * @property string $icon 
 * @property string $permission 
 * @property int $keepAlive 
 * @property int $hidden 
 * @property int $hideChildrenInMenu 
 * @property int $action_type 
 * @property string $button_type 
 * @property int $blank 
 * @property int $create_time 
 * @property int $update_time 
 * @property int $delete_time 
 */
class Permission extends ModelBase implements ModelInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permission';

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
    protected $fillable = ['id', 'name', 'title', 'pid', 'type', 'status', 'path', 'redirect', 'component', 'icon', 'permission', 'keepAlive', 'hidden', 'hideChildrenInMenu', 'action_type', 'button_type', 'blank', 'create_time', 'update_time', 'delete_time'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'pid' => 'integer', 'status' => 'integer', 'keepAlive' => 'integer', 'hidden' => 'integer', 'hideChildrenInMenu' => 'integer', 'action_type' => 'integer', 'blank' => 'integer', 'create_time' => 'integer', 'update_time' => 'integer', 'delete_time' => 'integer'];
}