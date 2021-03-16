<?php
declare(strict_types=1);

namespace App\Service\Admin;

use App\Event\UserLogin;
use App\Model\User;
use App\Model\Role;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

class UserService
{

    /**
     * @Inject
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function loginLog($user)
    {
        $this->eventDispatcher->dispatch(new UserLogin($user));
    }

    /**
     * @param  RequestInterface $request
     */
    public static function checkUser($request)
    {

        $userInfo = $request->all();

        if (!$user = User::query()->where('name', $userInfo['name'])
            ->orWhere('email', $userInfo['name'])->first()) {
            return false;
        }
        if (false === password_verify($userInfo['password'], $user->password)) {
            return false;
        }

        $user['header'] = $request->header('User-Agent');
        $user['url'] = $request->getRequestUri();
        $user['ip'] = $request->getHeaderLine('x-forwarded-for');

        (new self)->loginLog($user);

        return true;
    }

    /**
     * @param RequestInterface $request
     * @return bool
     * @noinspection PhpParamsInspection
     */
    public static function create(RequestInterface $request): bool
    {
        $userInfo = $request->all();

        $data['name'] = $userInfo['name'];
        $data['nickname'] = $userInfo['nickname'];
        $data['status'] = $userInfo['status'];
        $data['dept_id'] = $userInfo['dept_id'];
        $data['password'] = password_hash($userInfo['password'], PASSWORD_BCRYPT);

        //添加角色
        if (!$user = User::query()->create($data)) {
            return false;
        }

        //绑定角色
        (new self)->bindRole($user, $userInfo['roles']);

        return true;
    }

    /**
     * @param \errorist\Permission\Contract\User $user
     * @param array $roles
     * @noinspection CallableParameterUseCaseInTypeContextInspection
     */
    public function bindRole(\errorist\Permission\Contract\User $user, array $roles): void
    {
        //绑定角色
        $roles = Role::whereIn('id', $roles)->get();

        foreach ($roles as $role) {
            $user->assignRole($role);
        }
    }
}