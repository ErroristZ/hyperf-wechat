<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $id 
 * @property string $name 
 * @property string $title 
 * @property int $menu_id 
 * @property int $create_time 
 * @property int $update_time 
 * @property int $delete_time 
 */
class MenuAction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu_action';
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
    protected $casts = ['id' => 'integer', 'menu_id' => 'integer', 'create_time' => 'integer', 'update_time' => 'integer', 'delete_time' => 'integer'];
}