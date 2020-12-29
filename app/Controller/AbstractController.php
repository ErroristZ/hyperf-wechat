<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Container\ContainerInterface;
use Hyperf\Contract\LengthAwarePaginatorInterface;


abstract class AbstractController
{
    /**
     * @Inject
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @Inject
     * @var RequestInterface
     */
    protected $request;

    /**
     * @Inject
     * @var ResponseInterface
     */
    protected $response;

    public function getPaginateData(LengthAwarePaginatorInterface $paginateData)
    {
        return [
            'data' => $paginateData->items(),
            'pageNo' => $paginateData->currentPage(),
            'lastPage' => $paginateData->lastPage(),
            'totalCount' => $paginateData->total(),
            'pageSize' => $paginateData->perPage()
        ];
    }

    public function getPageSize()
    {
        return $this->request->input('pageSize') == null ? 10 : (int)$this->request->input('pageSize');
    }
}
