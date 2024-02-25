<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutPageController extends Controller
{
    public function aboutPage()
    {
        $sliders = AboutPage::where('status', 'active')->get();
        $company = User::withCount('job')->where('role', 'companies')->orderBy('job_count', 'desc')->limit(4)->get();
      

        //return $sliders;
        return view('fontend.pages.about', compact('company', 'sliders'));
    }

    public function aboutSliderStore(Request $request)
    {
        $request->validate([
            'vision' => 'required',
            'slider_name' => 'required',
            'slider_image' => 'required',

        ]);

        $img = $request->file('slider_image');

        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "slider-{$t}-{$file_name}";
        $img_url = "uploads/about/{$img_name}";

  

        // Upload File
        $img->move(public_path('uploads/about'), $img_name);
        AboutPage::create([
            'vision' => $request->input('vision'),
            'slider_name' => $request->input('slider_name'),
            'slider_image' => $img_url,
        ]);

        return redirect('/aboutPage/admin')->with('success', 'Slider Updated Successfully');

    }

}




