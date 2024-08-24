<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobApplicaionsController extends Controller
{
    protected function UserApplyForJob(Request $request)
    {
        dd($request->all());
        return back();
    }
}
