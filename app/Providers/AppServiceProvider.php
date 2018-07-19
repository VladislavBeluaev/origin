<?php

namespace App\Providers;
use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('updatedPivot', function($expression) {

            if($expression=='$updatorDocument')
            return "<?php echo ($expression)->username. ' изменил запись '. ($expression)->pivot->updated_at->diffForHumans(); ?>";

            return "<?php echo ($expression)->username. ' создал запись '.($expression)->pivot->updated_at->diffForHumans(); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
