<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateExperience;

class CandidateExperienceController extends Controller
{
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
            return redirect()->back()->with('success', 'Data created successfully');

                // return response()->json([
                //     'massage'=>'Data created successfully',
                //     'data'=>$data
                // ]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
