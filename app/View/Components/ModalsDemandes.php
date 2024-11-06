<?php

namespace App\View\Components;

use App\Models\Demande;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalsDemandes extends Component
{
    /**
     * Create a new component instance.
     */
    public $demande;
    public function __construct($id)
    {
        $this->demande = Demande::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals-demandes');
    }
}
