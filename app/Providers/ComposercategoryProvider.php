<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposercategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        \view()->composer(['fontend.master', 'fontend.baohanh', 'fontend.gioithieu', 'fontend.category', 'fontend.tracuudon', 'fontend.tintuc', 'blog.detailblog', 'fontend.timkiem'],
            'App\Http\ViewComposers\CategoryComposer'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
