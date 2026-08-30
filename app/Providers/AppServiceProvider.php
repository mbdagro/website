<?php

namespace App\Providers;

use App\Concern;
use Illuminate\Support\ServiceProvider;
use App\HomeManagement;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     if ($this->app->environment('production')) {
    //         URL::forceScheme('https');
    //     }
    //      view()->composer('*', function ($view) {

    //         $HomeManagement = HomeManagement::first();
    //         $ConcernTitle = Concern::get();
    //         //...with this variable
    //         $view->with('HomeManagement', $HomeManagement,);
    //         $view->with('ConcernTitle', $ConcernTitle); 
    //         //  $categoryMenu = Category::select('id', 'name')->get();
    //         // $subCategoryMenu = SubCategory::select('id', 'name')->get();

    //         //  $view->with('category_menu', $categoryMenu);
			
	// 		//$view->with('sub_category_menu', $subCategoryMenu);

    //         // View::share('key', 'value');
    //     });
    // }

    public function boot()
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        view()->composer('*', function ($view) {

            $HomeManagement = HomeManagement::first();

            // Concerns + related Sister Projects eager load
            $ConcernTitle = Concern::with('sisterProjects')->get();
            $europaHousing = Concern::where('title', 'Europa Housing Ltd.')->first();
            $europaElevator = Concern::where('title', 'Europa Elevator')->first();
            $europaDevelopers = Concern::where('title', 'Europa Developers Ltd.')->first();

            // return view('your_menu_view', compact('europaElevator', 'europaDevelopers'));

            $view->with('HomeManagement', $HomeManagement);
            $view->with('ConcernTitle', $ConcernTitle);
            $view->with('europaHousing', $europaHousing);
            $view->with('europaElevator', $europaElevator);
            $view->with('europaDevelopers', $europaDevelopers);

        });
    }
}
