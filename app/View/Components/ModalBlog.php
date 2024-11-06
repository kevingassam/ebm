<?php

namespace App\View\Components;

use App\Models\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalBlog extends Component
{
    /**
     * Create a new component instance.
     */
    public $article;
    public function __construct($id)
    {
        $this->article = Blog::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-blog');
    }
}
