<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $version 
 * @property string $migration_name 
 * @property string $start_time 
 * @property string $end_time 
 * @property int $breakpoint 
 */
class Migration extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'migrations';
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
    protected $casts = ['version' => 'integer', 'breakpoint' => 'integer'];
}