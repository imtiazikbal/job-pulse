<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use App\Models\User;
use App\Models\AppliedJob;
use Illuminate\Http\Request;

class HomeViewController extends Controller
{
    public function index()
    {
        try{
            $details = User::withCount('job')->where('role', 'companies')->orderBy('job_count', 'desc')->limit(4)->get();
        $jobs = Job::with('user')->where('status', 'active')->orderBy('created_at', 'desc')->limit(5)->paginate(5);
        return view('home', compact('jobs', 'details'));
      // return $jobs;
            
          // return response()->json($details);
        }catch(Exception $e){
            return $e->getMessage();
        }  
           // return $jobs;
    }
    function pegesHome(){}

    
}
