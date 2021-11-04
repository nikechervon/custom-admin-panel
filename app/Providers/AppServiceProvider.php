<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        $this->blade();
    }

    /**
     * @return void
     */
    private function blade(): void
    {
        Blade::if('isManager', function () {
            return auth()->user()->isManager();
        });

        Blade::if('isEmployee', function () {
            return auth()->user()->isEmployee();
        });
    }
}
