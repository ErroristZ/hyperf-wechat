<?php

declare (strict_types=1);

namespace App\Model;

use Hyperf\Database\Model\SoftDeletes;
use Hyperf\HttpServer\Contract\RequestInterface;
/**
 * @property int $id 
 * @property string $name 
 * @property int $pid 
 * @property int $disable 
 * @property int $create_time 
 * @property int $update_time 
 * @property int $delete_time 
 */
class ArticleCategory extends ModelBase implements ModelInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_category';

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
    protected $fillable = ['id', 'name', 'pid', 'disable', 'create_time', 'update_time', 'delete_time'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'pid' => 'integer', 'disable' => 'integer', 'create_time' => 'integer', 'update_time' => 'integer', 'delete_time' => 'integer'];

    /**
     * @param RequestInterface $request
     * @return bool
     */
    public static function create($request)
    {
        $Info = $request->all();

        $data['disable'] = $Info['disable'];
        $data['name'] = $Info['name'];
        $data['pid'] = $Info['pid'];

        //添加
        if (!$info = ArticleCategory::query()->create($data)) {
            return false;
        }

        return true;
    }
}