<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Information;
use App\Models\Service;
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

            $top10RandomServices = Service::select('id', 'titre')->with('SousServices')->orderby("order","asc")->limit(10)->get();

            $view->with('infos', $infos)
                ->with('last2Blog', $last2Blog)
                ->with('top10RandomServices', $top10RandomServices);
        });
    }
}
