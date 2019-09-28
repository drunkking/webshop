<?php

namespace App\Providers;

use App\Repositories\ProductRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;

use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;

use App\Repositories\RoleRepository;
use App\Repositories\Interfaces\RoleRepositoryInterface;

use App\Repositories\CartRepository;
use App\Repositories\Interfaces\CartRepositoryInterface;

use App\Repositories\OrderRepository;
use App\Repositories\Interfaces\OrderRepositoryInterface;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class, 
            ProductRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class, 
            CategoryRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class, 
            UserRepository::class
        );

        
        $this->app->bind(
            RoleRepositoryInterface::class, 
            RoleRepository::class
        );

        $this->app->bind(
            CartRepositoryInterface::class, 
            CartRepository::class
        );

        $this->app->bind(
            OrderRepositoryInterface::class, 
            OrderRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
