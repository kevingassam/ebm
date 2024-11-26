<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalSousServices extends Component
{
    /**
     * Create a new component instance.
     */
    public $sous;
    public function __construct($sous)
    {
        $this->sous = $sous ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-sous-services');
    }
}
