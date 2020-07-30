<?php

namespace App\Http\Controllers;

use Fjord\Support\Facades\Form;

class PageController
{
    public function home()
    {
        $data = Form::load('pages', 'home');

        return view('pages.home')->withData($data);
    }
}
