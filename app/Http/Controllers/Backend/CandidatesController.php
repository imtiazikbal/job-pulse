<?php

namespace App\Http\Controllers\Backend;

use App\Models\AppliedJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidatesController extends Controller
{
    public function index()
    
    {
        $details = AppliedJob::where('user_id', auth()->user()->id)->count();
        if(auth()->user()->role == 'candidates') {
        return view('candidates.home', compact('details'));
    }else{
        return redirect('/login');
    }
}
}
