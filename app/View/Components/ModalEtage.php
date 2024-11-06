<?php

namespace App\View\Components;

use App\Models\Appartement;
use App\Models\DetailsAppartement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalEtage extends Component
{
    /**
     * Create a new component instance.
     */
    public $etage,$appartement;
    public function __construct($id)
    {
        $this->etage = DetailsAppartement::find($id);
        $this->appartement = Appartement::find($this->etage->appartement_id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-etage');
    }
}
