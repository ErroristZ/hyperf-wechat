<?php
declare(strict_types=1);
namespace App\Controller;
use Hyperf\HttpServer\Annotation\DeleteMapping;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PutMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Phper666\JWTAuth\JWT;
use Hyperf\HttpServer\Annotation\Middleware;
use Phper666\JWTAuth\Middleware\JWTAuthMiddleware;
use Phper666\JWTAuth\Middleware\JWTAuthSceneDefaultMiddleware;
use Phper666\JWTAuth\Middleware\JWTAuthSceneApplication1Middleware;
use Hyperf\Di\Annotation\Inject;
use Psr\Container\ContainerInterface;

/**
 * @\Hyperf\HttpServer\Annotation\Controller(prefix="api")
 * Class IndexController
 * @package App\Controller
 */
class IndexController
{
    /**
     *
     * @Inject
     * @var JWT
     */
    protected $jwt;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->request = $container->get(RequestInterface::class);
        $this->response = $container->get(ResponseInterface::class);
    }

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function login()
    {
        $username = $this->request->input('username');
        $password = $this->request->input('password');
        if ($username && $password) {
            $userData = [
                'uid' => 1, // 如果使用单点登录，必须存在配置文件中的sso_key的值，一般设置为用户的id
                'username' => 'xx',
            ];
            // 使用默认场景登录
            $token = $this->jwt->setScene('default')->getToken($userData);
            $data = [
                'code' => 0,
                'msg' => 'success',
                'data' => [
                    'token' => $token,
                    'exp' => $this->jwt->getTTL(),
                ]
            ];
            return $this->response->json($data);
        }
        return $this->response->json(['code' => 0, 'msg' => '登录失败', 'data' => []]);
    }

    public function refreshToken()
    {
        $token = $this->jwt->refreshToken();
        $data = [
            'code' => 0,
            'msg' => 'success',
            'data' => [
                'token' => (string)$token,
                'exp' => $this->jwt->getTTL(),
            ]
        ];
        return $this->response->json($data);
    }

    public function logout()
    {
        return $this->jwt->logout();
    }

    public function getData()
    {
        $data = [
            'code' => 0,
            'msg' => 'success',
            'data' => $this->jwt->getParserData()
        ];
        return $this->response->json($data);
    }
}