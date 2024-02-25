<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\Job;
use App\Models\Home;
use App\Models\User;
use App\Models\Company;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use App\Models\CompanyContact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $totalCompany = User::where('role', 'companies')->count();
            $PendingPostJob = Job::where('status', 'inactive')->count();
            $ActivePostJob = Job::where('status', 'active')->count();
            return view('admin.pages.analytic', compact('totalCompany', 'PendingPostJob', 'ActivePostJob'));
        } else {
            return redirect('/login');
        }
    }
    public function AdminJobs()
    {
        $jobsActive = Job::with('user')->where('status', 'active')->get();
        $jobsInactive = Job::with('user')->where('status', 'inactive')->get();
        // return [$jobsActive, $jobsInactive];
        return view('admin.pages.jobs', compact('jobsActive', 'jobsInactive'));
    }
    public function AdminCompanies()
    {
        $companies = User::where('role', 'companies')->get();
        return view('admin.pages.companies', compact('companies'));
    }

    public function Companiesdelete(Request $request, $id)
    {
        Company::where('user_id', $id)->delete();
        CompanyContact::where('user_id', $id)->delete();
        User::where('id', $id)->delete();
        return redirect()->back()->with('delete', 'Company Deleted Successfully');
    }

    public function changeJobStatus(Request $request, $id)
    {
        $job = Job::find($id);
        $job->status = $request->status;
        $job->save();
        return redirect()->back()->with('success', 'Job Status Changed Successfully');

    }
    public function jobDelete(Request $request, $id)
    {

        $job = Job::find($id);
        $job->delete();
        return redirect()->back()->with('delete', 'Job Deleted Successfully');
    }
    function pegesHome(){
      
      $slider = Home::all();
      return view('pages.home',compact('slider'));
      
    }

function aboutPageAdmin(){
  $slider = AboutPage::all();
  return view ('pages.about',compact('slider'));
}
  
    public function storeSlider(Request $request)
    {
        //dd($request->all());

        
          $request->validate([
            'slider_name' => 'required',
            'slider_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
          $img=$request->file('slider_image');
    
          $t=time();
          $file_name=$img->getClientOriginalName();
          $img_name="slider-{$t}-{$file_name}";
          $img_url="uploads/home/{$img_name}";
  
  
          // Upload File
          $img->move(public_path('uploads/home'),$img_name);
          Home::create([
            'slider_name'=>$request->input('slider_name'),
            'slider_image'=>$img_url
          ]);

          return redirect()->back()->with('success', 'Slider Added Successfully');
        
      
    }
    function storeSliderUpdate(Request $request,$id){
     // dd($request->all());
      Home::where('id',$id)->update([
        'status'=>$request->input('status')
      ]);
      return redirect()->back()->with('success', 'Slider Updated Successfully');
    }
    function updateSliderStatusAbout(Request $request,$id){
      // dd($request->all());
       AboutPage::where('id',$id)->update([
         'status'=>$request->input('status')
       ]);
       return redirect()->back()->with('success', 'Slider Updated Successfully');
    }
    function deleteSliderStatusAbout(AboutPage $slider){
      // dd($slider);
      File::delete($slider->slider_image);
      $slider->delete();
      return redirect()->back()->with('warning', 'Slider Deleted Successfully');
    }

    function storeSliderDelete(Request $request){
     // dd($request->all());
      $id = $request->input('id');
            $file_path = $request->input('file_path');
            File::delete($file_path);


            Home::where('id',$id)->delete();
      return redirect()->back()->with('warning', 'Slider Deleted Successfully');
            
    }

    //about page
  

   function aboutSliderStoreEdit(AboutPage $AboutData){
   // dd($request->all());
   //return $AboutData;
   $data =  $AboutData;
  //  $data = AboutPage::where('id',$id)->first();
    return view('pages.editAbout',compact('data'));
   }
    public function logout01()
    {
        auth()->logout();
        return redirect('/');
    }
    function aboutSliderUpdate(Request $request, $id)
{
   //dd($request->all());
    $request->validate([
        'vision' => 'required',
        'slider_name' => 'required',

    ]);

    if ($request->hasFile('slider_image')) {

        $img = $request->file('slider_image');

        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "slider-{$t}-{$file_name}";
        $img_url = "uploads/{$img_name}";
        //delete old file
        $file_path = $request->input('file_path');
        File::delete($file_path);

        // Upload File
        $img->move(public_path('uploads'), $img_name);
        AboutPage::where('id', $id)->update([
            'vision' => $request->input('vision'),
            'slider_name' => $request->input('slider_name'),
            'slider_image' => $img_url,
        ]);

        return redirect('/aboutPage/admin')->with('success', 'Slider Updated Successfully');
    } else {

        AboutPage::where('id', $id)->update([
            'vision' => $request->input('vision'),
            'slider_name' => $request->input('slider_name'),
        ]);
        return redirect('/aboutPage/admin')->with('success', 'Slider Updated Successfully');
    }
}
}