<?php

namespace App\Providers;

use App\Repositories\Contact\ContactInterface;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Setting\SettingInterface;
use App\Repositories\Setting\SettingRepository;
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
        $this->app->singleton(ContactInterface::class, ContactRepository::class);
        $this->app->singleton(SettingInterface::class, SettingRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
