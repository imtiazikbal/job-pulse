<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
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
            //dd($request->all());
            $data = Job::create([
                'user_id'=>auth()->user()->id,
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
            // return response()->json([
            //     'massage'=>'Data created successfully',
            //     'data'=>$data
            // ]);
            
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
            return redirect()->back()->with('success', 'Job updated successfully');
            // return response()->json([
            //     'massage'=>'Data updated successfully',
            //     'data'=>$data
            // ]);
    }
    catch(Exception $e){
        return $e->getMessage();
    }

}
function jobDelete(Request $request){

    
    
    try{
        $data = Job::where('id',$request->id)->where('user_id',auth()->user()->id)->delete();
        return redirect()->back()->with('success', 'Job deleted successfully');
    }
    catch(Exception $e){
        return $e->getMessage();
    }
    
}
function whoApplied(Request $request){
    $jobs= AppliedJob::where('company_id','=',auth()->user()->id)->with('job','user')->get();
   // $jobs= AppliedJob::where('company_id',$request->user_id)->with('job','user')->get();
 //return $jobs;
    return view('companies.pages.job.whoApplied',compact('jobs'));
}


}
