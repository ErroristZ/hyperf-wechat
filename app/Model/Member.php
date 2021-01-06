<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
use Hyperf\HttpServer\Contract\RequestInterface;
/**
 * @property int $id 
 * @property string $nickname 
 * @property string $avatar 
 * @property string $email 
 * @property string $openid 
 * @property int $create_time 
 * @property int $update_time 
 * @property int $delete_time 
 */
class Member extends Model
{
}