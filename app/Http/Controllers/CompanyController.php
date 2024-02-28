<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\CandidateExperience;
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

       
            Company::create([
                'user_id' => auth()->user()->id,
                'year_of_establishment' => $request->year_of_establishment,
                'description' => $request->description,
                'type' => $request->type,
                'website' => $request->website,
                'license' => $request->license,
            ]);

           return redirect()->back()->with('success', 'Profile created successfully.');
       
    }

    function ProfileEdit(Company $company){

        return view('companies.pages.editProfile', compact('company'));
    }
    function ProfileUpdate(Request $request,$company){

        Company::where('id',$company)->update([
            'year_of_establishment' => $request->year_of_establishment,
            'description' => $request->description,
            'type' => $request->type,
            'website' => $request->website,
            'license' => $request->license,
        ]);
        return redirect('/profilepage')->with('success', 'Profile Updated successfully.');
    }
    
    function companyProfile(Request $request){
        
        $company = Company::where('user_id', auth()->user()->id)->first();
        if($company){
      return view('companies.pages.profile-page', compact('company'));
            
        }else{
      return view('companies.pages.createProfile', compact('company'));
            
        }
    }

    public function updateCompanyProfile(Request $request)
    {
       
            $details = Company::where('user_id', $request->user_id)->update([
                'year_of_establishment' => $request->year_of_establishment,
                'description' => $request->description,
                'type' => $request->type,
                'website' => $request->website,
                'license' => $request->license,
            ]);
            return redirect()->back()->with('success', 'Profile Updated successfully.');

       
    }
    public function deleteCompanyProfile(Request $request)
    {
        try {
            $details = Company::where('user_id', $request->user_id)->delete();

            return redirect()->back()->with('warning', 'Profile Deleted successfully.');

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

        $details = User::where('id', $request->user_id)->with('education', 'salary',)->first();
        $experience = CandidateExperience::where('user_id', $request->user_id)->with('experience')->get();
       
       
      // return $details;
     // return $experience;
    return view('companies.pages.profile.cv', compact('details', 'experience'));
       
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
       // return response()->json($details);
    }

   
}
