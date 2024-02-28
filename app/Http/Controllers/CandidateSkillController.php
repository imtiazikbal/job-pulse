<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateSkill;

class CandidateSkillController extends Controller
{
    function candidateSkillPage(){
        $skills = CandidateSkill::where('user_id',auth()->user()->id)->get();
        if($skills){
            return view('candidates.pages.skill',compact('skills'));
        }
        return view('candidates.pages.createSkill',compact('skills'));
    }
    function Create(Request $request){
        try{


            //dd($request->all());
           CandidateSkill::create([
               'user_id'=>auth()->user()->id,
               // input name skill save in database with array
              // $array = array_map('intval', explode(',', $string));
               'skill'=>json_encode($request->skill)
              
            ]);
            

            return redirect()->back()->with('success', 'Skill created successfully.');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    function Delete(CandidateSkill $skill){
        $skill->delete();
        return redirect()->back()->with('warning', 'Skill deleted successfully');
    }
}
