<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
use Hyperf\HttpServer\Contract\RequestInterface;
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
class Permission extends Model
{
}