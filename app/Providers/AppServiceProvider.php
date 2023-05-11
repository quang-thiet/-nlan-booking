<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        if (Schema::hasColumn('setting', 'email') && Schema::hasColumn('setting', 'author_name')) {
            $setting = Setting::query()->firstOrCreate(['id' => 1], [
                'name' => 'Booking',
                'logo' => 'Default.png',
                'phone' => '0987654321',
                'map' => 'link map',
                'address' => 'Địa chỉ',
                'email' => 'Email',
                'author_name' => 'Chủ website'
            ]);
    
            View::share('setting', $setting);
        }
    }
}
