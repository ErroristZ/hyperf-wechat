<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $id 
 * @property string $model 
 * @property string $url 
 * @property string $action 
 * @property string $sql 
 * @property int $user_id 
 * @property int $create_time 
 * @property int $update_time 
 * @property int $delete_time 
 */
class DbLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'db_log';
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
    protected $casts = ['id' => 'integer', 'user_id' => 'integer', 'create_time' => 'integer', 'update_time' => 'integer', 'delete_time' => 'integer'];
}