<?php

namespace App\Providers;

use App\Services\Auth\AuthInterface;
use App\Services\Auth\AuthService;
use App\Services\Users\UsersInterface;
use App\Services\Users\UsersService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class,AuthService::class);
        $this->app->bind(UsersInterface::class,UsersService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
