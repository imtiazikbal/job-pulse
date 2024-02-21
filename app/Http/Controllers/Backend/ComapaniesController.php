<?php

namespace App\Http\Controllers\Backend;

use App\Models\Job;
use App\Models\AppliedJob;
use App\Http\Controllers\Controller;

class ComapaniesController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'companies') {
            $totalJobPost = Job::where('user_id', auth()->user()->id)->count();
            $details = AppliedJob::where('company_id', auth()->user()->id)->count();
            return view('companies.analysis', compact('details', 'totalJobPost'));
        } else {
//return"loginRoute";
            return redirect('/login');
        }
    }
}
