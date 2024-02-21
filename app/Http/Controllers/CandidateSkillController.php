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
            $data = CandidateSkill::create([
               'user_id'=>auth()->user()->id,
               // input name skill save in database with array
              // $array = array_map('intval', explode(',', $string));
               'skill'=>$request->skill
              
            ]);
            
            return response()->json([
                'massage'=>'Data created successfully',
                'data'=>$data
            ]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
