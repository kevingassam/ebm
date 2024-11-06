<?php

namespace App\View\Components;

use App\Models\Partenaire;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalsPartenaires extends Component
{
    /**
     * Create a new component instance.
     */
    public $partenaire;
    public function __construct($id)
    {
        $this->partenaire = Partenaire::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals-partenaires');
    }
}
