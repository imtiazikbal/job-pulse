<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\AppliedJob;
use Illuminate\Http\Request;

class HomeViewController extends Controller
{
    public function index()
    {
            $jobs = Job::with('user')->where('status', 'active')->get();
           // return $jobs;
        return view('home', compact('jobs'));
    }
}
