<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Listeners\UpdateLastLoginAt;
use App\Listeners\UpdateLastLogoutAt;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [
            UpdateLastLoginAt::class,
        ],
        Logout::class => [
            UpdateLastLogoutAt::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();
    }
}
