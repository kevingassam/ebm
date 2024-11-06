<?php

namespace App\View\Components;

use App\Models\Projet;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalProjet extends Component
{
    /**
     * Create a new component instance.
     */
    public $projet;
    public function __construct($id)
    {
        $this->projet = Projet::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-projet');
    }
}
