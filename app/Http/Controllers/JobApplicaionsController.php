<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicaionsController extends Controller
{
    protected function UserApplyForJob(Request $req)
    {
        // dd($request->all());
        $request=$req->validate([
            'JobId'=>'required',
            'UserName'=>'required',
            'UserEmail'=>['required','unique:job_applications,Email'],
            'UserPortfolio'=>['url'],
            'UserCV'=>['required','mimes:pdf'],
        ],[
            'UserCV.required'=>'Cv is Required For Application', 
        ]);
        $userCVPath = $req->file('UserCV')->store('cvs', 'public');
        // dd($userCVPath);
        $NewCreatedJobApplication=JobApplication::create([
            'Job_id'=>$request['JobId'],
            'Name'=>$request['UserName'],
            'Email'=>$request['UserEmail'],
            'Portfolio'=>$request['UserPortfolio'],
            'CV'=>$userCVPath,
        ]);

        return back()->with('success','Application subbmitted');
    }
}
