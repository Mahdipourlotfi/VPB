<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
        $path = storage_path("app/private/languages.json");
        
        //Check if the file exists
        if (file_exists($path)) {
            $fileContent = file_get_contents($path);
           $all_lngs = json_decode($fileContent, true);
            view()->share('lngs',$all_lngs );
        }
    }
}
