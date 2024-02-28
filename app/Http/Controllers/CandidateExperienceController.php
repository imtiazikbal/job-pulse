<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateExperience;

class CandidateExperienceController extends Controller
{

    function jobExperience(){
        $experience = CandidateExperience::where('user_id',auth()->user()->id)->get();
        
        return view('candidates.pages.experience',compact('experience'));
    }
    function jobExperienceCreate(Request $request){
        try{
            //dd($request->all());   
                $data = CandidateExperience::create([
                    'user_id'=>auth()->user()->id,
                    'dasignation'=>$request->dasignation,
                    'company_name'=>$request->company_name,
                    'joining_date'=>$request->joining_date,
                    'depature_time'=>$request->depature_time
                ]);
            return redirect()->back()->with('success', 'Experience created successfully');

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    function jobExperienceDelete(CandidateExperience $experience){
        $experience->delete();
        return redirect()->back()->with('success', 'Experience deleted successfully');
    }
}
