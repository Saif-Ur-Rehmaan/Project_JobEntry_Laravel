<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public $CData;
    public $PageName;
    public function __construct($linkArray )
    { 
        $links = explode(",", $linkArray);
        $this->CData = $links;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
 
        return view('components.breadcrumb');
    }
}
