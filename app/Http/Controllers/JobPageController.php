<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class JobPageController extends Controller
{
    function allJobs(){

        $jobs = Job::with('user')->where('status', 'active')->orderBy('created_at', 'desc')->limit(5)->paginate(5);
   $details = User::withCount('job')->where('role', 'companies')->orderBy('job_count', 'desc')->limit(4)->get();
   //return $details;

return view('pages.job',compact('jobs','details'));
    }
    
    function searchJob(Request $request){
        $jobs = Job::where('status', 'active')->where('title', 'like', '%' . $request->search . '%')->paginate(5);
      
     // return $jobs;
         return view('pages.job',compact('jobs'));
    }
    function jobdetailsPage(){
        return view('pages.components.jobDetailsPage');
    }
}
