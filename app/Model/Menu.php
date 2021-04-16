<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
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
 * @property int $blank 
 * @property int $create_time 
 * @property int $update_time 
 * @property int $delete_time 
 */
class Menu extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'pid' => 'integer', 'status' => 'integer', 'keepAlive' => 'integer', 'hidden' => 'integer', 'hideChildrenInMenu' => 'integer', 'blank' => 'integer', 'create_time' => 'integer', 'update_time' => 'integer', 'delete_time' => 'integer'];
}