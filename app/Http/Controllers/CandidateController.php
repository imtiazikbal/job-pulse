<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Candidate;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use App\Models\CandidateSalary;

class CandidateController extends Controller
{
    public function store(Request $request)
    {
        
        try{
           
            
           
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' =>'candidates',
            ]);  
            return redirect('/login')->with('success', 'User created successfully.');     
        //   return response()->json([
        //       'msg' => "success",
        //       'user' => $user
        //   ]);
        }catch(Exception $e){
             return $e->getMessage();
        }
    }
    function candidateStore(Request $request){
        try{
            dd($request->all());
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' =>'candidates',
            ]);  
           // return redirect('/login')->with('success', 'User created successfully.');     
          return response()->json([
              'msg' => "success",
              'user' => $user
          ]);
        }catch(Exception $e){
             return $e->getMessage();
        }
    }
    function profile(Request $request){
        try{
            $details = Candidate::create([
                'user_id' => $request->user_id,
                'phone' => $request->phone,
                'f_name' => $request->f_name,
                'm_name' => $request->m_name,
                'dob'=> $request->dob
            ]);
           return response()->json($details);
           }catch(Exception $e){
               return $e->getMessage();    
           }
    }
    function updateprofile(Request $request){
        try{
            dd($request->all());
            $details = Candidate::where('user_id',$request->user_id)->update([
                'phone' => $request->phone,
                'f_name' => $request->f_name,
                'm_name' => $request->m_name,
                'dob'=> $request->dob
            ]);
           return response()->json($details);
           }catch(Exception $e){
               return $e->getMessage();    
           }
    }


public function appliedJob(Request $request){
    try{

       //dd($request->all());
        $data = AppliedJob::create([
            'user_id'=>auth()->user()->id,
            'job_id'=>$request->job_id,
            'company_id'=>$request->company_id
        ]);
        $salary = CandidateSalary::create([
            'user_id'=>auth()->user()->id,
            'current_salary'=>$request->current_salary,
            'excepted_salary'=>$request->excepted_salary
        ]);
        return response()->json([
            'massage'=>'Data created successfully',
            'data'=>$data,
            'salary'=>$salary
        ]);
    }catch(Exception $e){
        return $e->getMessage();
        
    }
}
function appliedJobPage(Request $request){
    $jobs = AppliedJob::where('user_id',auth()->user()->id)->with('job','company')->get();
    //return response()->json($jobs);
    return view('candidates.pages.applied_job',compact('jobs'));
}


function candidateLogin(Request $request){
    $user = User::where('email', $request->email)->where('password', $request->password)->first();
    
    if ($user) {
        
        if ($user->role == 'candidates') {
            return redirect('/candidates/dashboard');
        } else {
            return redirect('/candidate/register');
        }
    }else{
        return "Invalid Email or Password";
       // return redirect('/companies/register');
    }
}






    
function candidateDetails(Request $request){

    $details = User::where('id',$request->user_id)->with('candidate','education','experience','training','skill')->first();
    return response()->json($details);
}
}
