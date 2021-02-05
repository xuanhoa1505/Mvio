<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class SidebarServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boots()
    {

    }
    public function boot()
    {
        view()->composer('home.layout.sidebar', function($view) {
            
            
            $sidebar1 = DB::table('categores')->where('level', 1)->get();
            $sidebar2 = DB::table('categores')->where('level', 2)->get();
            $sidebar3 = DB::table('categores')->where('level', 3)->get();

            $view->with([
               
                'sidebar1' => $sidebar1,
                'sidebar2' => $sidebar2,
                'sidebar3' => $sidebar3
            ]);
        });        
    }
    
}
