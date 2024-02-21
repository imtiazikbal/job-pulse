<?php

namespace App\Http\Controllers\Backend;

use App\Models\Job;
use App\Models\User;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $totalCompany= User::where('role','companies')->count();
            $PendingPostJob = Job::where('status','inactive')->count();
            $ActivePostJob = Job::where('status','active')->count();
            return view('admin.pages.analytic',compact('totalCompany','PendingPostJob','ActivePostJob'));
        } else {
            return redirect('/login');
        }
    }
    function logout01()
    {
        auth()->logout();
        return redirect('/');
    }
}
