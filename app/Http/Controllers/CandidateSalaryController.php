<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateSalaryController extends Controller
{
    function salaryPage(){

        return view('candidates.pages.salary');
    }
}
