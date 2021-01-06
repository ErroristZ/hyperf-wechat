<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
use Hyperf\HttpServer\Contract\RequestInterface;
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
class Post extends Model
{
}