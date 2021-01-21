<?php
declare(strict_types=1);

namespace App\Service\Admin;

use App\Event\UserLogin;
use Hyperf\Di\Annotation\Inject;
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
}