<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
        $this->mapMenueDishCats();
        $this->mapDishes();
        $this->mapDishesUnits();
        $this->mapClients();
        $this->mapOrders();
        $this->mapPettyAccounts();
        $this->mapPeriodicAccounts();
        $this->mapAccounts();
        $this->mapGeneralDataSettings();
        $this->mapBillSettings();
        $this->mapUsersSettings();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapMenueDishCats()
    {
        Route::middleware(['web', 'auth'])
              ->prefix('menue/dish-categories')
              ->name('menue.dish-categories.')
              ->namespace("App\Http\Controllers")
              ->group(base_path('routes/menue/dish-categories.php'));
    }

    protected function mapDishes()
    {
        Route::middleware(['web', 'auth'])
              ->prefix('menue/dishes')
              ->name('menue.dishes.')
              ->namespace("App\Http\Controllers")
              ->group(base_path('routes/menue/dishes.php'));
    }

    protected function mapDishesUnits()
    {
        Route::middleware(['web', 'auth'])
              ->prefix('menue/dishes-units')
              ->name('menue.dishes-units.')
              ->namespace("App\Http\Controllers")
              ->group(base_path('routes/menue/dishes-units.php'));
    }

    protected function mapClients()
    {
        Route::middleware(['web', 'auth'])
              ->prefix('clients')
              ->name('clients.')
              ->namespace("App\Http\Controllers")
              ->group(base_path('routes/clients/clients.php'));
    }

    protected function mapOrders()
    {
        Route::middleware(['web', 'auth'])
              ->prefix('orders/orders')
              ->name('orders.orders.')
              ->namespace("App\Http\Controllers")
              ->group(base_path('routes/orders/orders.php'));
    }
    protected function mapPettyAccounts()
    {
      Route::middleware(['web', 'auth'])
            ->prefix('accounts/petty-accounts')
            ->name('accounts.petty-accounts.')
            ->namespace("App\Http\Controllers")
            ->group(base_path('routes/accounts/petty-accounts/petty-accounts.php'));
    }
    protected function mapPeriodicAccounts()
    {
      Route::middleware(['web', 'auth'])
            ->prefix('accounts/periodic-accounts')
            ->name('accounts.periodic-accounts.')
            ->namespace("App\Http\Controllers")
            ->group(base_path('routes/accounts/periodic-accounts/periodic-accounts.php'));
    }
    protected function mapAccounts()
    {
      Route::middleware(['web', 'auth'])
            ->prefix('accounts')
            ->name('accounts.')
            ->namespace("App\Http\Controllers")
            ->group(base_path('routes/accounts/accounts.php'));
    }
    protected function mapGeneralDataSettings()
    {
      Route::middleware(['web', 'auth'])
            ->prefix('settings/general-data')
            ->name('settings.general-data.')
            ->namespace("App\Http\Controllers")
            ->group(base_path('routes/settings/general-data.php'));
    }
    protected function mapBillSettings()
    {
      Route::middleware(['web', 'auth'])
            ->prefix('settings/bill')
            ->name('settings.bill.')
            ->namespace("App\Http\Controllers")
            ->group(base_path('routes/settings/bill.php'));
    }
    protected function mapUsersSettings()
    {
      Route::middleware(['web', 'auth'])
            ->prefix('settings/users')
            ->name('settings.users.')
            ->namespace("App\Http\Controllers")
            ->group(base_path('routes/settings/users.php'));
    }
}
