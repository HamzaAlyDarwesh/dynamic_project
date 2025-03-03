<?php

namespace App\Providers;

use App\Interfaces\AttributeServiceInterface;
use App\Interfaces\AuthServiceInterface;
use App\Interfaces\ProjectServiceInterface;
use App\Services\AttributeService;
use App\Services\AuthService;
use App\Services\ProjectService;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AttributeServiceInterface::class, AttributeService::class);
        $this->app->bind(ProjectServiceInterface::class, ProjectService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::hashClientSecrets();
    }
}
