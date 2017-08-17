<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Account\{
    IAccount,
    AccountEloquent
};
use App\Repositories\Advertisement\{
    IAdvertisement,
    AdvertisementEloquent
};
use App\User;
use App\Repositories\Advertisement\Advertisement;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAccount::class, function() {
            $model = new AccountEloquent(new User);

            return $model;
        });

        $this->app->bind(IAdvertisement::class, function() {
            $model = new AdvertisementEloquent(new Advertisement);

            return $model;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            IAccount::class,
            IAdvertisement::class
        ];
    }
}
