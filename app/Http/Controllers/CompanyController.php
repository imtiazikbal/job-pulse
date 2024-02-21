<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Company;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{

    public function store(Request $request)
    {
        try {

            //dd($request->all());
           User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'companies',
            ]);
            return redirect('/login');
            //return response()->json($user);
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }
    public function profile(Request $request)
    {
        try {
            
            $details = Company::create([
                'user_id' => auth()->user()->id,
                'year_of_establishment' => $request->year_of_establishment,
                'description' => $request->description,
                'type' => $request->type,
                'website' => $request->website,
                'license' => $request->license,
            ]);

            return response()->json([
                'message' => 'Profile Created Successfully',
            ]);
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }
    
    function companyProfileEdit(Request $request){
        
        $company = Company::where('user_id', auth()->user()->id)->first();
        return view('companies.pages.profile-page', compact('company'));
    }

    public function updateCompanyProfile(Request $request)
    {
        try {
            $details = Company::where('user_id', $request->user_id)->update([
                'year_of_establishment' => $request->year_of_establishment,
                'description' => $request->description,
                'type' => $request->type,
                'website' => $request->website,
                'license' => $request->license,
            ]);
            return response()->json([
                'message' => 'Profile Updated Successfully',
                'details' => $details,
            ]);

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }
    public function deleteCompanyProfile(Request $request)
    {
        try {
            $details = Company::where('user_id', $request->user_id)->delete();
            return response()->json([
                'message' => 'Profile Deleted Successfully',
                'details' => $details,
            ]);

        } catch (Exception $e) {
            return $e->getMessage();

        }
    }

    public function companyLogin(Request $request)
    {

        $user = User::where('email', $request->email)->where('password', $request->password)->first();
    
        if ($user) {
            
            if ($user->role == 'companies') {
                return view('companies.dashboard');
            } else {
                return redirect('/companies/register');
            }
        }else{
            return "Invalid Email or Password";
           // return redirect('/companies/register');
        }
    }

    public function companyDetails(Request $request)
    {

        $details = User::where('id', $request->user_id)->with('education', 'salary', 'experience','training','skill','contact')->first();
       //return $details;
       return view('companies.pages.profile.cv', compact('details'));
       
       // return response()->json($details);
    }
    public function appliedJobDetails(Request $request)
    {
        $details = AppliedJob::where('user_id', $request->user_id)->with('job', 'user', 'salary', 'company')->get();
        return response()->json($details);
    }
    function totalAppliedCount(Request $request){
        $details = AppliedJob::where('company_id', auth()->user()->id)->count();
        return view('companies.analysis', compact('details'));
        //return response()->json($details);
    }
}
