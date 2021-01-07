<?php

declare(strict_types=1);

namespace App\Controller\Admin\Log;
use App\Controller\AbstractController;
use App\Model\DbLog;
use Hyperf\HttpServer\Contract\ResponseInterface;

class DataBaseLogController extends AbstractController{

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function list(ResponseInterface $response)
    {
        $data = $this->getPaginateData(DbLog::getList([], $this->getPageSize(), ['*'], 'id', 'DESC'));
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => $data])->withStatus(200);
    }

    /**
     * @param ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function delete(ResponseInterface $response)
    {
        $data = DbLog::getFirstById($this->request->input('id'));
        if (!$data)
        {
            return $response->json(['message' => '数据库日志不存在', 'result' => $data])->withStatus(403);
        }
        $data->delete();
        return $response->json(['message' => '操作成功','code' => 20000, 'result' => []])->withStatus(200);
    }
}