<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\Database\Model\SoftDeletes;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * @property int $id 
 * @property string $title 
 * @property string $image 
 * @property int $category_id 
 * @property string $content 
 * @property int $top 
 * @property int $sort 
 * @property int $status 
 * @property int $create_time 
 * @property int $update_time 
 * @property int $delete_time 
 */
class Article extends ModelBase implements ModelInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article';

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
    protected $fillable = ['id', 'title', 'category_id', 'image', 'content',
        'content', 'top', 'status', 'create_time', 'update_time', 'delete_time'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'category_id' => 'integer', 'top' => 'integer', 'sort' => 'integer', 'status' => 'integer', 'create_time' => 'integer', 'update_time' => 'integer', 'delete_time' => 'integer'];

    /**
     * @param RequestInterface $request
     * @return bool
     */
    public static function create($request)
    {
        $Info = $request->all();

        $data['title'] = $Info['title'];
        $data['image'] = $Info['image'];
        $data['category_id'] = $Info['category_id'];
        $data['content'] = $Info['content'];
        $data['top'] = $Info['top'];

        //添加
        if (!$info = Article::query()->create($data)) {
            return false;
        }

        return true;
    }
}