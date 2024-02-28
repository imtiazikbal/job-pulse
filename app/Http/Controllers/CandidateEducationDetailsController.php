<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateEducationDetails;

class CandidateEducationDetailsController extends Controller
{


    function educationCreatePage(){
        
        $education = CandidateEducationDetails::where('user_id',auth()->user()->id)->first();

        if($education){
            return view('candidates.pages.education',compact('education'));
        }
        return view('candidates.pages.createEducation');
    }
public function educationStore(Request $request){
    try{
       
        CandidateEducationDetails::updateOrCreate([
            'user_id'=>auth()->user()->id,
            'bechelors'=>$request->bechelors,
            'hsc'=>$request->hsc,
            'ssc'=>$request->ssc,
            'university_name'=>$request->university_name,
            'department'=>$request->department,
            'hons_passing_year'=>$request->hons_passing_year,
            'cgpa'=>$request->cgpa,
            'hsc_college_name'=>$request->hsc_college_name,
            'hsc_gpa'=>$request->hsc_gpa,
            'hsc_passing_year'=>$request->hsc_passing_year,
            'hsc_group'=>$request->hsc_group,
            'ssc_school_name'=>$request->ssc_school_name,
            'ssc_passing_year'=>$request->ssc_passing_year,
            'ssc_group'=>$request->ssc_group,
            'ssc-gpa'=>$request->input('ssc-gpa'),
            
            
        ]);

        return redirect()->back()->with('success', 'Education Details created/updated successfully.');
    }catch(Exception $e){
        return $e->getMessage();
    }
}

function educationDelete(CandidateEducationDetails $education){

    $education->delete();
    return redirect()->back()->with('success', 'Education Details deleted successfully.');
}
}
