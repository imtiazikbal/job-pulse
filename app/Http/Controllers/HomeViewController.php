<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use App\Models\Home;
use App\Models\User;
use App\Models\AppliedJob;
use Illuminate\Http\Request;

class HomeViewController extends Controller
{
    public function index()
    {
        try{
           $company = User::withCount('job')->where('role', 'companies')->orderBy('job_count', 'desc')->limit(3)->get();
          $jobs = Job::with('user')->where('status', 'active')->orderBy('created_at', 'desc')->limit(5)->paginate(5);
          $sliders = Home::where('status', 'active')->get();
        
      //  return view('home', compact('jobs', 'details', 'sliders'));
      //return view('fontend.pages.home', compact('jobs', 'details', 'sliders'));
    return $sliders;
            
          // return response()->json($details);
        }catch(Exception $e){
            return $e->getMessage();
        }  
           // return $jobs;
    }
    function app(){
        $company = User::withCount('job')->where('role', 'companies')->orderBy('job_count', 'desc')->limit(3)->get();
        
        $jobs = Job::with('user')->where('status', 'active')->orderBy('created_at', 'desc')->limit(5)->paginate(5);

      return view('fontend.pages.home', compact('jobs','company'));
        
    }

   

    public function sliderPage()
    {
        $sliders = Home::where('status', 'active')->get();
       // return $sliders;
        return view('pages.components.slider', compact('sliders'));
    }

}
