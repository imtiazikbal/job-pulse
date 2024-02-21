<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CompanyContact;

class CompanyContactController extends Controller
{
    function create(Request $request){
        try{
            $data = CompanyContact::create([
               'user_id' => auth()->user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'designation' => $request->designation
            ]);
            return redirect()->back();
            // return response()->json([
            //     'message' => 'Profile Deleted Successfully',
            //     'details' => $data
            // ]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
}
function contactPage(Request $request){
    $companies = CompanyContact::where('user_id', auth()->user()->id)->first();
   return view('companies.pages.contact-page', compact('companies'));
}
function update(Request $request){
    try{
        $data = CompanyContact::where( 'user_id', $request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'designation' => $request->designation
        ]);
        return response()->json([
            'message' => 'Profile Deleted Successfully',
            'details' => $data
        ]);
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}
}