<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateProfessionalTraining;

class CandidateProfessionalTrainingController extends Controller
{

    function jobTraning(){
        $trainings = CandidateProfessionalTraining::where('user_id',auth()->user()->id)->get();
        if($trainings){
            return view('candidates.pages.training',compact('trainings'));
            
        }else{
        return view('candidates.pages.createTraining');
            
        }
    }
    function trainingCreate(Request $request){
        try{
            //dd($request->all());
            CandidateProfessionalTraining::create([
                'user_id' => auth()->user()->id,
                'name'=>$request->name,
                'institute_name'=>$request->institute_name,
                'completion_year'=>$request->completion_year
                
            ]);
            return redirect('/traing/index')->with('success', 'Traning created successfully');
           
        }catch(Exception $exception){
            return $exception->getMessage();
        }
        
    }
    function trainingIndex(){
        $trainings = CandidateProfessionalTraining::where('user_id',auth()->user()->id)->get();
        return view('candidates.pages.training',compact('trainings'));
    }
    function trainingDelete(CandidateProfessionalTraining $training){
        $training->delete();
        return redirect()->back()->with('success', 'Traning deleted successfully');
    }
}
