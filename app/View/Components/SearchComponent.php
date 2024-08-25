<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Job;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $Categories;
    public $Locations;
    public function __construct()
    {
        $this->Categories=Category::all(['id','name']);
        $this->Locations=Job::all('JobLocation')->unique("JobLocation");
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    { 
        return view('components.search-component');
    }
}
