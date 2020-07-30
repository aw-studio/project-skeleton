<?php

namespace FjordApp\Providers;

use Fjord\Crud\Fields\Route;
use Fjord\Crud\Fields\Route\RouteCollection;
use Fjord\Support\Facades\Fjord;
use FjordPages\Models\FjordPage;
use Illuminate\Support\ServiceProvider;

class RouteFieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::register('app', fn ($collection) => $this->registerCollection($collection));
    }

    /**
     * Register route collection.
     *
     * @param  RouteCollection $collection
     * @return void
     */
    public function registerCollection(RouteCollection $collection)
    {
        $collection->route('Home', 'home', fn () => Fjord::isAppTranslatable() ? __route('home') : route('home'));

        FjordPage::collection('root')->get()->addToRouteCollection('Seiten', $collection);
    }
}
