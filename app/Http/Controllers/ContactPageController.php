<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    function contact()
    {
        $details = User::withCount('job')->where('role', 'companies')->orderBy('job_count', 'desc')->limit(4)->get();

        return view('contact', compact('details'));
    }
}
