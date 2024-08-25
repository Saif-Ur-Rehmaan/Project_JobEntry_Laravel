<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class JobCategory extends Component
{
    /**
     * Create a new component instance.
     */
    public $Data;
    public function __construct()
    {
        
        
        $JobCategories = DB::select("
        SELECT count(_jobs.Category_id) as job_count, _categories.name,_categories.SvgIcon
        FROM _jobs
        INNER JOIN _categories ON _jobs.Category_id = _categories.id
        GROUP BY _jobs.Category_id, _categories.name,_categories.SvgIcon
        ");

        $this->Data = $JobCategories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.job-category');
    }
}
