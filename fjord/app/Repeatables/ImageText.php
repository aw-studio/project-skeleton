<?php

namespace FjordApp\Repeatables;

use Fjord\Crud\Fields\Block\Repeatables;

class ImageText
{
    public function register()
    {
        Repeatables::macro('image_text', function () {
            $this->add('image_text', function ($form, $preview) {
                //$preview->col('{text}')->stripHtml()->maxChars(50);

                $preview->col('{text}')->stripHtml()->maxChars(50);

                $form->image('image')->maxFiles(1)->title('Image')->width(1 / 2)->expand();

                $form->wysiwyg('text')->title('Text')->width(1 / 2);
            })->view('rep.image_text');
        });
    }
}
