<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Log;

class UpdateLastLogoutAt
{
    public function handle(Logout $event)
    {
        if ($event->user) {
            
            $event->user->update([
                'last_logout_at' => now(),
            ]);
        }
    }
}
