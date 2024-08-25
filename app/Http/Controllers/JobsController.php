<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class JobsController extends Controller
{
    public function JobListPage()
    {
        return view('joblist');
    }
    public function JobDetailsPage(int $id)
    {
        $Job = Job::all()->find($id);
        return view('jobdetails', compact('Job'));
    }
    protected function UserApplyForJob(Request $req)
    {
        $request = $req->validate([
            'JobId' => 'required',
            'UserName' => 'required',
            'UserEmail' => ['required', 'unique:job_applications,Email'],
            'UserPortfolio' => ['url'],
            'UserCV' => ['required', 'mimes:pdf'],
        ], [
            'UserCV.required' => 'Cv is Required For Application',
        ]);
        $userCVPath = $req->file('UserCV')->store('cvs', 'public');

        $NewCreatedJobApplication = JobApplication::create([
            'Job_id' => $request['JobId'],
            'Name' => $request['UserName'],
            'Email' => $request['UserEmail'],
            'Portfolio' => $request['UserPortfolio'],
            'CV' => $userCVPath,
        ]);

        return back()->with('success', 'Application subbmitted');
    }
    public function JobCategoryPage()
    {
        return view('jobcategory');
    }
    public function JobListFilterByCategoryNamePage(string $CategoryName)
    {

        $Category = Category::all()->where('name', $CategoryName)->first();
        // dd($CategoryId);
        if (!$Category) {
            return back()->with("alert", "Category Not Found");
            die();
        }
        $CategoryId = $Category->id;
        $FullTimeJobs = DB::table("_jobs")->where("JobNature", 'Full-time')->where("Category_id", $CategoryId)->get();
        $PartTimeJobs = DB::table("_jobs")->where("JobNature", 'Part-time')->where("Category_id", $CategoryId)->get();
        $ContractJobs = DB::table("_jobs")->where("JobNature", 'Contract')->where("Category_id", $CategoryId)->get();
        $Data = [
            'FullTime' => $FullTimeJobs,
            'PartTime' => $PartTimeJobs,
            'Contract' => $ContractJobs,
        ];
        return view("joblist", compact('Data'));
    }
    public function JobListFilterBySearchPage(Request $req)
    {
        [$JN,$JC,$JL]=[$req->all()['JobName'],$req->all()['JobCategory'],$req->all()['JobLocation']];
        
        $PartTimeJobs = DB::table("_jobs")
        ->where("JobNature", 'Part-time')
        ->where('JobName', 'like','%'.$JN.'%')
        ->where('JobLocation', 'like','%'.$JL.'%')
        ->where('Category_id', 'like','%'.$JC.'%')
        ->get();
        $FullTimeJobs = DB::table("_jobs")
        ->where("JobNature", 'Full-time')
        ->where('JobName', 'like','%'.$JN.'%')
        ->where('JobLocation', 'like','%'.$JL.'%')
        ->where('Category_id', 'like','%'.$JC.'%')
        ->get();
        $ContractJobs = DB::table("_jobs")
        ->where("JobNature", 'Conrtact')
        ->where('JobName', 'like','%'.$JN.'%')
        ->where('JobLocation', 'like','%'.$JL.'%')
        ->where('Category_id', 'like','%'.$JC.'%')
        ->get();
        $Data = [
            'FullTime' => $FullTimeJobs,
            'PartTime' => $PartTimeJobs,
            'Contract' => $ContractJobs,
        ]; 
        return view('Searchjob', compact('Data'));
        
    }
}
