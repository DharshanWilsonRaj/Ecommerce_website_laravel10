<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    // public $color;
    // public $bgcolor;
    // public $hoverBgcolor;
    // public $hoverColor;
    // public $class;
//
    // public function __construct($bgcolor = '#15121E', $color = '#fff', $hoverBgcolor = '#242031', $hoverColor = '#fff', $class = '')
    public function __construct()
    {
        // $this->bgcolor = $bgcolor;
        // $this->color = $color;
        // $this->hoverBgcolor = $hoverBgcolor;
        // $this->hoverColor = $hoverColor;
        // $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
