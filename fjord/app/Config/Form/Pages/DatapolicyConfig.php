<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Pages\DatapolicyController;

class DatapolicyConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = DatapolicyController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "pages/datapolicy";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'datapolicy',
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->card(function($form) {

            $form->input('text')
                ->title('text');

            // ...
        });
    }
}
