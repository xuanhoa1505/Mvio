<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\doituong;
use App\Models\Customers;
//use App\Models\Logo;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('home.shop', function($view) {
            $Customers = Customers::all();
            //dd($doituong);

            $view->with([
                'Customers' => $Customers
            ]);
        });
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boots()
    {
        view()->composer('welcome', function($view) {
            $doituong = doituong::all();
            //dd($doituong);

            $view->with([
                'doituong' => $doituong
            ]);
        });
    }
    public function boot()
    {
        
        view()->composer('welcome', function($view) {
            
            
            $categores1 = DB::table('categores')->where('level', 1)->get();
            $categores2 = DB::table('categores')->where('level', 2)->get();
            $categores3 = DB::table('categores')->where('level', 3)->get();
            $logo1 = DB::table('Logo')->where('stt','1')->get(); 

            $view->with([
               
                'categores1' => $categores1,
                'categores2' => $categores2,
                'categores3' => $categores3,
                'logo1' => $logo1,
            ]);
        });
    }
    
}
