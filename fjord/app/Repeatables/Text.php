<?php

namespace FjordApp\Repeatables;

use Fjord\Crud\Fields\Block\Repeatables;

class Text
{
    public function register()
    {
        Repeatables::macro('text', function () {
            $this->add('text', function ($form, $preview) {
                $preview->col('{text}')->stripHtml()->maxChars(50);

                $form->wysiwyg('text')->title('Text');
            })->view('rep.text');
        });
    }
}
