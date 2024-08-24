<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    public function JobListPage(){
        $FullTimeJobs=DB::table("_jobs")->where("JobNature",'Full-time')->get();
        $PartTimeJobs=DB::table("_jobs")->where("JobNature",'Part-time')->get();
        $ContractJobs=DB::table("_jobs")->where("JobNature",'Contract')->get();

        $Data=[
            'FullTime'=>$FullTimeJobs,
            'PartTime'=>$PartTimeJobs,
            'Contract'=>$ContractJobs,
        ];
        
        return view('joblist',compact('Data'));
    }
    public function JobDetailsPage(int $id){
        $Job=Job::all()->find($id);
        return view('jobdetails',compact('Job'));
    }
    public function JobCategoryPage(){
        return view('jobcategory');
    }
}
