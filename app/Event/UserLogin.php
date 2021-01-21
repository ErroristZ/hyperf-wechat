<?php

declare(strict_types=1);

namespace App\Event;

class UserLogin
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
}