<?php

namespace App\Providers;

use App\Core\Contracts\ExternalAdapterContract;
use App\Core\Repositories\PermissionRepository;
use App\Core\Repositories\ProductRepository;
use App\Core\Repositories\CategoryRepository;
use App\Core\Repositories\RolRepository;
use App\Core\Repositories\UserRepository;
use App\Core\Repositories\AuthRepository;
use App\Infraestructure\Adapters\ExternalServiceAdapter;
use App\Infraestructure\Repositories\EloquentPermissionRepository;
use App\Infraestructure\Repositories\EloquentProductRepository;
use App\Infraestructure\Repositories\EloquentCategoryRepository;
use App\Infraestructure\Repositories\EloquentRolRepository;
use App\Infraestructure\Repositories\EloquentUserRepository;
use App\Infraestructure\Repositories\EloquentAuthRepository;
use App\Infraestructure\Services\ExternalService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(AuthRepository::class, EloquentAuthRepository::class);
        $this->app->bind(RolRepository::class, EloquentRolRepository::class);
        $this->app->bind(PermissionRepository::class, EloquentPermissionRepository::class);
        $this->app->bind(ProductRepository::class, EloquentProductRepository::class);
        $this->app->bind(CategoryRepository::class, EloquentCategoryRepository::class);
        $this->app->bind(ExternalAdapterContract::class, ExternalServiceAdapter::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
