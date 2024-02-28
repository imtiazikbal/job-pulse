<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
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

    function findJobs(){
        $coutJobs = Job::where('status', 'active')->count();
        $jobs = Job::with('user')->where('status', 'active')->orderBy('created_at', 'desc')->limit(5)->paginate(5);
        $jobType = Job::distinct()->get(['type']);
       return view('fontend.pages.jobs',compact('jobs','coutJobs','jobType'));
      // return $jobType;
    }
    function JobsDetails(Request $request){
        $job = Job::with('user')->where('user_id',$request->company_id)->first();
        $company = Company::where('user_id',$request->company_id)->first();
        return view('fontend.pages.jobDetails',compact('job','company'));
    }
    function filterType(Request $request){
        
        
      $selected = $request->input('type',[]);
     
    $jobs = Job::withCount('user')->where('status', 'active')->whereIn('employment_status',  $selected)->orderBy('created_at', 'desc')->paginate(5);
    $jobType = Job::distinct()->get(['type']);
   
       
    return view('fontend.pages.jobs',compact('jobs','jobType'));
       //return $jobs;
    }

    function filterLocation(Request $request){
        
        $selected = $request->input('location');
     $job = Job::query();

        if($selected == 'Anywhere'){
            $job->orderBy('location', 'desc')->limit(3);
            
        }else{
    $job->withCount('user')->where('status', 'active')->where('location',  $selected)->orderBy('created_at', 'desc')->paginate(5);
            
        }
    $jobs = $job->paginate(5);
    $jobType = Job::distinct()->get(['type']);

    return view('fontend.pages.jobs',compact('jobs','jobType'));
    
       // return $jobs;
}

function filterExperience(Request $request){
    $selected = $request->input('experience',[]);
    
   // dd($request->all());
     
    $jobs = Job::withCount('user')->where('status', 'active')->whereIn('exprience',  $selected)->orderBy('created_at', 'desc')->paginate(5);
    $jobType = Job::distinct()->get(['type']);
       
    return view('fontend.pages.jobs',compact('jobs','jobType'));
      // return $jobs;
}
function filterLocationTittle(Request $request){
    $location = $request->input('location');
    $title = $request->input('title');
    // $job = Job::query();

    // if ($location) {
    //     $job->where('location', 'like', "%$location%");
    // }

    // if ($title) {
    //     $job->where('title', 'like', "%$title%");
    // }

    // Execute the query
   // $jobs = $job->orderBy('created_at', 'desc')->paginate(5);
   $jobs = Job::withCount('user')->where('status', 'active')->where('location', 'like', "%$location%")->where('title', 'like', "%$title%")->orderBy('created_at', 'desc')->paginate(5);
    //$jobs = Job::with('user')->where('status', 'active')->where('location',  $selected)->orderBy('created_at', 'desc')->paginate(5);
    $jobType = Job::distinct()->get(['type']);
   
    return view('fontend.pages.jobs',compact('jobs','jobType'));
   //return $jobs;
}

function filterRelevanceOld(Request $request){
   // dd($request->all());
    $selected = $request->input('select');
    $job = Job::query();

    if ($selected == 'Older') {
        $job->orderBy('created_at', 'asc')->limit(3);
    }
    if($selected == 'Relevance'){
        $job->orderBy('created_at', 'desc')->limit(3);
    }
   $jobs = $job->where('status', 'active')->paginate(5);
  //  $jobs = Job::withCount('user')->where('status', 'active')->where('')->orderBy('created_at', 'desc')->paginate(5);
  $jobType = Job::distinct()->get(['type']);
   
  return view('fontend.pages.jobs',compact('jobs','jobType'));
    //return $jobs;
    
}
function filterCategoryType(Request $request){
   // dd($request->all());
    $selected = $request->input('type');
    $jobs = Job::withCount('user')->where('status', 'active')->where('type',  $selected)->orderBy('created_at', 'desc')->paginate(5);
    $jobType = Job::distinct()->get(['type']);
   
    return view('fontend.pages.jobs',compact('jobs','jobType'));
    //return $jobs;
}
function filterCategoryTypeGet(Request $request){
   // dd($request->all());
    $selected = $request->input('jobType');
    $jobs = Job::withCount('user')->where('status', 'active')->where('type',  $selected)->orderBy('created_at', 'desc')->paginate(5);
    $jobType = Job::distinct()->get(['type']);
   
    return view('fontend.pages.jobs',compact('jobs','jobType'));
    //return $jobs;
}
}
