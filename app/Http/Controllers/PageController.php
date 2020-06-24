<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fjord\Support\Facades\Form;

class PageController
{
    public function home()
    {
        $data = Form::load('pages', 'home');

        return view('pages.home')->withData($data);
    }

    public function imprint()
    {
        $data = Form::load('pages', 'imprint');

        return view('pages.imprint')->withData($data);
    }

    public function datapolicy()
    {
        $data = Form::load('pages', 'datapolicy');

        return view('pages.datapolicy')->withData($data);
    }
}
