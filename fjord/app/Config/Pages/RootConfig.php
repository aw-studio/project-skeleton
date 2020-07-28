<?php

namespace FjordApp\Config\Pages;

use App\Http\Controllers\Pages\RootController;
use Fjord\Crud\Fields\Block\Repeatables;
use FjordApp\Controllers\Pages\RootController as FjordRootController;
use FjordPages\PagesConfig;
use Illuminate\Routing\Route;

class RootConfig extends PagesConfig
{
    /**
     * Fjord controller class.
     *
     * @var string
     */
    public $controller = FjordRootController::class;

    /**
     * App controller class.
     *
     * @var string
     */
    public $appController = RootController::class;

    /**
     * Application route prefix.
     *
     * @param  string|null $locale
     * @return string
     */
    public function appRoutePrefix(string $locale = null)
    {
        return 'root';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Seite',
            'plural'   => 'Seiten',
        ];
    }

    /**
     * Make repeatbles that should be available for pages.
     *
     * @param  Repeatables $rep
     * @return void
     */
    public function repeatables(Repeatables $rep)
    {
        $rep->text();
        $rep->image();
    }
}
