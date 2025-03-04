<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    // ...existing code...

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-only', function (User $user) {
            return $user->isAdmin();
        });
    }
}
