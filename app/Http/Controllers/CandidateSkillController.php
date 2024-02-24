<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateSkill;

class CandidateSkillController extends Controller
{
    function Create(Request $request){
        try{


            //dd($request->all());
           CandidateSkill::create([
               'user_id'=>auth()->user()->id,
               // input name skill save in database with array
              // $array = array_map('intval', explode(',', $string));
               'skill'=>$request->skill
              
            ]);
            

            return redirect()->back()->with('success', 'Skill created successfully.');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
