<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;

class CandidateSalaryController extends Controller
{
    function salaryPage( Request $request){
        $data = Job::with('user')->where('user_id',$request->company_id)->first();
        $company = Company::where('user_id',$request->company_id)->first();
//return $data;
//return $company;
       return view('pages.components.jobDetailsPage',compact('data','company'));
    }
}
