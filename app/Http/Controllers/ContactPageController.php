<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    function contact()
    {
        $company = User::withCount('job')->where('role', 'companies')->orderBy('job_count', 'desc')->limit(3)->get();

        return view('fontend.pages.contact', compact('company'));
    }
}
