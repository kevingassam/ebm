<?php

namespace App\View\Components;

use App\Models\DetailsAppartement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalParking extends Component
{
    /**
     * Create a new component instance.
     */
    public $parking;
    public function __construct($id)
    {
        $this->parking = DetailsAppartement::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-parking');
    }
}
