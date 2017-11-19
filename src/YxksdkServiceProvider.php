<?php

namespace Maokeyang\Yxksdk;

use Illuminate\Support\ServiceProvider;

class YxksdkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__ . '/routes.php';

        $this->mergeConfigFrom(
            __DIR__.'/config.php', 'yxksdk'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->publishes([
            //__DIR__ . '/views' => base_path('resources/views/vendor/yxksdk'),
            __DIR__.'/config.php' => config_path('yxksdk.php'),
        ]);


        $this->app->singleton('yxksdk',function(){
            return $this->app->make('Maokeyang\Yxksdk\YxksdkLib');
        });

        $this->app->make('Maokeyang\Yxksdk\YxksdkController');

        $this->loadViewsFrom(__DIR__ . '/views/', 'yxksdk');
    }
}
