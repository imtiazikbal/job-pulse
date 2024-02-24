<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobPageController extends Controller
{
    function allJobs(){

        $jobs = Job::with('user')->where('status', 'active')->orderBy('created_at', 'desc')->limit(5)->paginate(5);
   //  return $jobs;
         return view('pages.job',compact('jobs'));
    }
    
    function searchJob(Request $request){
        $jobs = Job::where('status', 'active')->where('title', 'like', '%' . $request->search . '%')->paginate(5);
      
     // return $jobs;
         return view('pages.job',compact('jobs'));
    }
}
