<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\CompanyContact;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $totalCompany= User::where('role','companies')->count();
            $PendingPostJob = Job::where('status','inactive')->count();
            $ActivePostJob = Job::where('status','active')->count();
            return view('admin.pages.analytic',compact('totalCompany','PendingPostJob','ActivePostJob'));
        } else {
            return redirect('/login');
        }
    }
    function AdminJobs(){
        $jobsActive = Job::with('user')->where('status', 'active')->get();
        $jobsInactive = Job::with('user')->where('status', 'inactive')->get();
       // return [$jobsActive, $jobsInactive];
        return view('admin.pages.jobs', compact('jobsActive', 'jobsInactive'));
    }
    function AdminCompanies(){
        $companies = User::where('role','companies')->get();
        return view('admin.pages.companies', compact('companies'));
    } 


  function Companiesdelete(Request $request,$id){
    Company::where('user_id', $id)->delete();
    CompanyContact::where('user_id', $id)->delete();
    User::where('id', $id)->delete();
    return redirect()->back()->with('delete', 'Company Deleted Successfully');
  }

  function changeJobStatus(Request $request,$id){
    $job = Job::find($id);
    $job->status = $request->status;
    $job->save();
    return redirect()->back()->with('success', 'Job Status Changed Successfully');
      
  }
  function jobDelete(Request $request,$id){

    $job = Job::find($id);
    $job->delete();
    return redirect()->back()->with('delete', 'Job Deleted Successfully');
  }
    function logout01()
    {
        auth()->logout();
        return redirect('/');
    }
}
