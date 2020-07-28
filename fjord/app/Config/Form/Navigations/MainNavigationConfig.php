<?php

namespace FjordApp\Config\Form\Navigations;

use Fjord\Crud\Config\FormConfig;
use Fjord\Crud\CrudShow;
use FjordApp\Controllers\Form\Navigations\MainNavigationController;

class MainNavigationConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = MainNavigationController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'navigations/main';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'MainNavigation',
        ];
    }

    /**
     * Setup form page.
     *
     * @param  \Fjord\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->list('nav')
                ->title('')
                ->maxDepth(3)
                ->previewTitle('{title}')
                ->form(function ($form) {
                    $form->input('title')
                        ->title('Link Text');
                    $form->route('route')
                        ->title('Route')
                        ->collection('app');
                });
        });
    }
}
