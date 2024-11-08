<?php

namespace App\View\Components;

use App\Models\Banner;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalBanners extends Component
{
    /**
     * Create a new component instance.
     */
    public $banner;
    public function __construct($id)
    {
        $this->banner = Banner::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-banners');
    }
}