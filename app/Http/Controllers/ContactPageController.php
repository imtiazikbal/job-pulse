<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    function contact()
    {
        return view('contact');
    }
}
