<?php

namespace App\Providers;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Session;

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
		//$menu = session()->get('click_menu');
		//dd($menu);
        //View::share('portalMenu', $menu);
		
		/*view()->composer('*', function ($view) 
    {
        $view->with('your_var', \Session::get('click_menu') );    
    }); */
		
    }
}
