<?php

declare(strict_types=1);

namespace App\Listener;

use App\Event\UserLogin;
use App\Model\Log;
use Hyperf\Event\Annotation\Listener;
use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;

/**
 * @Listener
 */
class UserLoginListener implements ListenerInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function listen(): array
    {
        return [
            UserLogin::class,
        ];
    }

    /**
     * @param UserLogin $event
     */
    public function process(object $event)
    {
        Log::create([
            'user_id'    => $event->user->id,
            'action'     => '登录',
            'url'        => $event->user->url,
            'ip'         => $event->user->ip,
            'user_agent' => $event->user->header,
        ]);
    }
}
