<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidatesController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'candidates') {
        return view('candidates.home');
    }else{
        return redirect('/login');
    }
}
}
