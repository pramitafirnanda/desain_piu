<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

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
        View::composer('layouts.dashboard-admin', function ($view) {
            $menus = Menu::whereNull('parent')->with('children')->orderBy('lvl')->get();
            $view->with('menus', $menus);

            /*$user = auth()->user();
            $menus = Menu::whereNull('parent')->whereHas('usermenu', function ($query) use ($user) {
                $query->where('kduser', $user->kduser)->where('uraks', 1);
            })->with('children')->get();

            $view->with('menus', $menus);*/
        });
    }
}
