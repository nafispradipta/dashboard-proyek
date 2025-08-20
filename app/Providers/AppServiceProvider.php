<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        // Set locale to Indonesian
        \Carbon\Carbon::setLocale('id');

        // Share application settings to all views as $appSettings
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $settings = \App\Models\Setting::query()->pluck('value', 'key')->toArray();
            } else {
                $settings = [];
            }
        } catch (\Throwable $e) {
            // During early bootstrap or before migrations, just provide empty settings
            $settings = [];
        }

        \Illuminate\Support\Facades\View::share('appSettings', $settings);
    }
}
