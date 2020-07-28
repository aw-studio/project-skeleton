<?php

namespace FjordApp\Repeatables;

use Fjord\Crud\Fields\Block\Repeatables;

class Image
{
    public function register()
    {
        Repeatables::macro('image', function () {
            $this->add('image', function ($form, $preview) {
                //$preview->col('{text}')->stripHtml()->maxChars(50);

                $form->image('image')->maxFiles(1)->title('Image');
            })->view('rep.text');
        });
    }
}
