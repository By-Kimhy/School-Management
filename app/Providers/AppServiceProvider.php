<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
        // Schema::defaultStringLength(255);

        // try{
        //     DB::connection()->getPDO();
        //     dump('Database is connected. Database name is'. DB::connection()->getDatabaseName());
        // }catch(Exception $e){
        //     dump('Database connection failed');
        // }
    }



}
