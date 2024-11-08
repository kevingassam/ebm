<?php

namespace App\View\Components;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalServices extends Component
{
    /**
     * Create a new component instance.
     */
    public $service;
    public function __construct($id)
    {
        $this->service = Service::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-services');
    }
}
