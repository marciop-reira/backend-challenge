<?php

namespace App\Providers;

use App\Repositories\ArticleRepository;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 *
 */
class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ArticleRepositoryInterface::class,
            ArticleRepository::class
        );
        $this->app->bind(
            \App\External\SpaceFlightNewsAPI\Repositories\Contracts\ArticleRepositoryInterface::class,
            \App\External\SpaceFlightNewsAPI\Repositories\ArticleRepository::class
        );
    }

    /**
     * @return void
     */
    public function boot()
    {
        //
    }
}
