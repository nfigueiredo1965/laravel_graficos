<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    ProductRepositoryInterface,
    ChartRepositoryInterface,
    UserRepositoryInterface,
    ReportRepositoryInterface
};

use App\Repositories\Core\Eloquent\{
    EloquentProductRepository,
    EloquentCategoryRepository,
    EloquentChartRepository,
    EloquentUserRepository,
    
};

use App\Repositories\Core\QueryBuilder\{
    QueryBuilderCategoryRepository,
    QueryBuilderReportRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            QueryBuilderCategoryRepository::class
            // EloquentCategoryRepository::class
        );

        $this->app->bind(
            ChartRepositoryInterface::class,
            EloquentChartRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            EloquentUserRepository::class
        );
        $this->app->bind(
            ReportRepositoryInterface::class,
            QueryBuilderReportRepository::class
        );
    }
}
