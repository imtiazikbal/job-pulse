<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateProfessionalTraining;

class CandidateProfessionalTrainingController extends Controller
{
    function trainingCreate(Request $request){
        try{
            //dd($request->all());
            $data = CandidateProfessionalTraining::create([
                'user_id' => auth()->user()->id,
                'name'=>$request->name,
                'institute_name'=>$request->institute_name,
                'completion_year'=>$request->completion_year
                
            ]);
            return redirect()->back()->with('success', 'Data created successfully');
            // return response()->json([
            //     'massage'=>'Data created successfully',
            //     '$data'=>$data
                
                
            // ]);
        }catch(Exception $exception){
            return $exception->getMessage();
        }
        
    }
}
