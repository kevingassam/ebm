<?php

namespace App\View\Components;

use App\Models\Temoignage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalTemoignages extends Component
{
    /**
     * Create a new component instance.
     */
    public $temoignage;
    public function __construct($id)
    {
        $this->temoignage = Temoignage::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-temoignages');
    }
}
