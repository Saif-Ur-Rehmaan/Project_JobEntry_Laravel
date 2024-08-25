<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class JobList extends Component
{
    /**
     * Create a new component instance.
     */
    public $Data;
    public function __construct()
    {
        $FullTimeJobs = DB::table("_jobs")->where("JobNature", 'Full-time')->get();
        $PartTimeJobs = DB::table("_jobs")->where("JobNature", 'Part-time')->get();
        $ContractJobs = DB::table("_jobs")->where("JobNature", 'Contract')->get();

        $this->Data = [
            'FullTime' => $FullTimeJobs,
            'PartTime' => $PartTimeJobs,
            'Contract' => $ContractJobs,
        ];

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.job-list');
    }
}
