<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactPageController extends Controller
{
    function contact()
    {
        $company = User::withCount('job')->where('role', 'companies')->orderBy('job_count', 'desc')->limit(3)->get();

        return view('fontend.pages.contact', compact('company'));
    }
    function contactMail(Request $request)
    {
       //dd($request->all());
      $data =[
        'message' => $request->message,
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject
      ];
      Mail::send('fontend.pages.contact-mail', $data, function($message) use ($data){
        $message->from($data['email'], $data['name']);
        $message->to('I9h0F@example.com')->subject($data['subject']);
      });

      return redirect()->back()->with('success', 'Message Sent Successfully');
    }
}
