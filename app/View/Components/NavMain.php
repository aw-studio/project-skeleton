<?php

namespace App\View\Components;

use Fjord\Crud\Models\FormField;
use Fjord\Support\Facades\Form;
use Illuminate\View\Component;

class NavMain extends Component
{
    /**
     * Main nav data.
     *
     * @var FormField
     */
    public $nav;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->nav = Form::load('navigations', 'main_navigation')->nav;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('nav.main');
    }
}
