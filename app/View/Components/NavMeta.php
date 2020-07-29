<?php

namespace App\View\Components;

use Fjord\Support\Facades\Form;
use Illuminate\View\Component;

class NavMeta extends Component
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
        $this->nav = Form::load('navigations', 'meta_navigation')->nav;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('nav.meta');
    }
}
