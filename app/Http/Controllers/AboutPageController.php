<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutPageController extends Controller
{
    function aboutPage(){
        $sliders = AboutPage::where('status', 'active')->get();
        $details = User::withCount('job')->where('role', 'companies')->orderBy('job_count', 'desc')->limit(4)->get();
        
       //return $sliders;
        return view('about',compact('sliders','details'));
      }

      function aboutSliderUpdate(Request $request, $id){
        // dd($request->all());
         $request->validate([
           'vision' => 'required',
           'slider_name' => 'required',
           
       ]);

       if($request->hasFile('slider_image')){
        
        $img=$request->file('slider_image');

        $t=time();
        $file_name=$img->getClientOriginalName();
        $img_name="slider-{$t}-{$file_name}";
        $img_url="uploads/{$img_name}";
     //delete old file
     $file_path = $request->input('file_path');
     File::delete($file_path);
    
        // Upload File
        $img->move(public_path('uploads'),$img_name);
        AboutPage::where('id',$id)->update([
          'vision'=>$request->input('vision'),
          'slider_name'=>$request->input('slider_name'),
          'slider_image'=>$img_url
        ]);

        return redirect('/aboutPage/admin')->with('success', 'Slider Updated Successfully');
       }else{

        AboutPage::where('id',$id)->update([
            'vision'=>$request->input('vision'),
            'slider_name'=>$request->input('slider_name'),
          ]);
        return redirect('/aboutPage/admin')->with('success', 'Slider Updated Successfully');
       }
       
   }
}

