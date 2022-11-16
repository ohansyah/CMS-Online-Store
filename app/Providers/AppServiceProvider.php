<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DatabaseConnectionCountCheck;
use Spatie\Health\Checks\Checks\DatabaseTableSizeCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\PingCheck;
use Spatie\Health\Checks\Checks\ScheduleCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        // spaties health check
        Health::checks([
            DatabaseCheck::new (),
            CacheCheck::new (),
            DatabaseConnectionCountCheck::new ()
                ->warnWhenMoreConnectionsThan(75)
                ->failWhenMoreConnectionsThan(100),
            DatabaseTableSizeCheck::new ()
                ->table('banners', 200)
                ->table('categories', 100)
                ->table('products', 300)
                ->table('product_images', 200)
                ->table('users', 100),
            DebugModeCheck::new (),
            EnvironmentCheck::new ()->expectEnvironment('production'),
            PingCheck::new ()->url('https://google.com')->label('Ping Google')->name('ping_google'),
            PingCheck::new ()->url('https://www.facebook.com/')->label('Ping Facebook')->name('ping_facebook'),
            ScheduleCheck::new (),

        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
