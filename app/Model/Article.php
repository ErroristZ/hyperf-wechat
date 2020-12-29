<?php

declare (strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Database\Model\Events\Creating;

/**
 */
class Article extends ModelBase implements ModelInterface
{
    /**
     *
     * @var string
     */
    protected $table = 'article';

    protected $fillable = ['id', 'title', 'image', 'image', 'content',
        'content', 'content', 'status', 'create_time', 'update_time', 'delete_time'
    ];

    /**
     *
     * @var array
     */
    protected $casts = [];

}