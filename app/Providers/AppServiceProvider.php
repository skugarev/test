<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Resource::withoutWrapping();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
    }

    /**
     *
     */
    protected function registerServices()
    {
        $services = [
            'App\Repositories\Interfaces\CostRepository' => 'App\Repositories\CostRepository',
            'App\Repositories\Interfaces\CategoryRepository' => 'App\Repositories\CategoryRepository',
        ];

        foreach ($services as $key => $value) {
            $this->app->singleton($key, $value);
        }
    }
}
