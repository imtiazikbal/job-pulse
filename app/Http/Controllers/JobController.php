<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use App\Models\ShortList;
use App\Models\AppliedJob;
use Illuminate\Http\Request;

class JobController extends Controller
{

    function jobs(Request $request){

        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('companies.pages.job.index',compact('jobs'));
    }
    function jobStore(Request $request){
        try{
           // dd($request->all());
         Job::create([
                'user_id'=>auth()->user()->id,
                //'user_id'=>$request->user_id,
                'title'=>$request->title,
                'description'=>$request->description,
                'exprience'=>$request->exprience,
                'requirements'=>$request->requirements,
                'responsibilities'=>$request->responsibilities,
                'benefits'=>$request->benefits,
                'location'=>$request->location,
                'age'=>$request->age,
                'salary'=>$request->salary,
                'vacancy'=>$request->vacancy,
                'tag'=>$request->tag,
                'type'=>$request->type,
                'employment_status'=>$request->employment_status     
            ]);
            return redirect()->back()->with('success', 'Job created successfully');

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    function edit(Request $request,$job_id){
        $jobs = Job::where('user_id',auth()->user()->id)->where('id',$job_id)->first();
        return view('companies.pages.job.edit',compact('jobs'));
        
    }
    function jobUpdate(Request $request){
        try{
           // dd($request->all());
            $data = Job::where('user_id',auth()->user()->id)->where('id',$request->id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'exprience'=>$request->exprience,
                'requirements'=>$request->requirements,
                'responsibilities'=>$request->responsibilities,
                'benefits'=>$request->benefits,
                'location'=>$request->location,
                'age'=>$request->age,
                'salary'=>$request->salary,
                'vacancy'=>$request->vacancy,
                'tag'=>$request->tag,
                'type'=>$request->type,
                'employment_status'=>$request->employment_status
            ]);
            return redirect('/jobs')->with('success', 'Job updated successfully');
            // return response()->json([
            //     'massage'=>'Data updated successfully',
            //     'data'=>$data
            // ]);
    }
    catch(Exception $e){
        return $e->getMessage();
    }

}
function jobDelete(Request $request,$job_id){

    
    
    try{
        $data = Job::where('id',$job_id)->where('user_id',auth()->user()->id)->delete();
        return redirect()->back()->with('warning', 'Job deleted successfully');
    }
    catch(Exception $e){
        return $e->getMessage();
    }
    
}
function whoApplied(Request $request){
    $jobs= AppliedJob::where('company_id','=',auth()->user()->id)->with('job','user','is_short_list')->get();
  // $jobs= ShortList::with('job','user')->get();
 //return $jobs;
 return view('companies.pages.job.whoApplied',compact('jobs'));
}

function shortlisted(Request $request){
    $user_id = $request->user_id;
    $job_id = $request->job_id;
    $company_id = $request->company_id;
    $appliedId = AppliedJob::where('user_id',$user_id)->where('job_id',$job_id)->first();
    ShortList::where('id',$appliedId->is_short_list)->create([
        'user_id'=>$user_id,
        'job_id'=>$job_id,
        'company_id'=>$company_id,
        'is_short_list'=> true,
        'applied_job_id'=>$appliedId->id
    ]);
    return redirect()->back()->with('success', 'Job shortlisted successfully');
   

}
}
