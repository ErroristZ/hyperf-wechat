<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $id 
 * @property int $role_id 
 * @property int $menu_action_id 
 */
class RoleAction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_action';
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
    protected $casts = ['id' => 'integer', 'role_id' => 'integer', 'menu_action_id' => 'integer'];
}