<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Information;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $infos = Information::firstOrCreate();

            $last2Blog = Blog::select('id', 'titre', 'photo', 'created_at')
                ->orderBy('id', 'desc')
                ->limit(2)
                ->get();

            $view->with('infos', $infos)
                 ->with('last2Blog', $last2Blog);
        });


    }
}
