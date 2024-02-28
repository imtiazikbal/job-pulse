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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        $jobsActive = Job::with('user')->get();
        
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
 function adminChangeJobStatus(Request $request)
    {
       // dd($request->all());

        $id = $request->input('id');
        Job::where('id', $id)->update([
            'status' => $request->input('status'),
        ]);
        
        $user = User::where('id', $request->input('user_id'))->first();
        $job= Job::where('id', $id)->first();
        $data =[
            'name' => $user->name,
            'email' => $user->email,
            'job' => $job->title,
            'status' => $job->status
        ];
        
        Mail::send(['html' => 'mail.jobStatus'], $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Job Status');
        });
        return redirect()->back()->with('success', 'Job Status Changed Successfully');

    }
    public function jobDelete(Request $request, $id)
    {

        $job = Job::find($id);
        $job->delete();
        return redirect()->back()->with('delete', 'Job Deleted Successfully');
    }
    public function pegesHome()
    {

        $slider = Home::all();
        return view('pages.home', compact('slider'));

    }

    public function aboutPageAdmin()
    {
        $slider = AboutPage::all();
        return view('pages.about', compact('slider'));
    }

    public function storeSlider(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'slider_name' => 'required',
            'slider_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $img = $request->file('slider_image');

        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "slider-{$t}-{$file_name}";
        $img_url = "uploads/home/{$img_name}";

        // Upload File
        $img->move(public_path('uploads/home'), $img_name);
        Home::create([
            'slider_name' => $request->input('slider_name'),
            'slider_image' => $img_url,
        ]);

        return redirect()->back()->with('success', 'Slider Added Successfully');

    }
    public function storeSliderUpdate(Request $request, $id)
    {
        // dd($request->all());
        Home::where('id', $id)->update([
            'status' => $request->input('status'),
        ]);
        return redirect()->back()->with('success', 'Slider Updated Successfully');
    }
    public function updateSliderStatusAbout(Request $request, $id)
    {
        // dd($request->all());
        AboutPage::where('id', $id)->update([
            'status' => $request->input('status'),
        ]);
        return redirect()->back()->with('success', 'Slider Updated Successfully');
    }
    public function deleteSliderStatusAbout(AboutPage $slider)
    {
        // dd($slider);
        File::delete($slider->slider_image);
        $slider->delete();
        return redirect()->back()->with('warning', 'Slider Deleted Successfully');
    }

    public function storeSliderDelete(Request $request)
    {
        // dd($request->all());
        $id = $request->input('id');
        $file_path = $request->input('file_path');
        File::delete($file_path);

        Home::where('id', $id)->delete();
        return redirect()->back()->with('warning', 'Slider Deleted Successfully');

    }

    //about page

    public function aboutSliderStoreEdit(AboutPage $AboutData)
    {
        // dd($request->all());
        //return $AboutData;
        $data = $AboutData;
        //  $data = AboutPage::where('id',$id)->first();
        return view('pages.editAbout', compact('data'));
    }
    public function logout01()
    {
        auth()->logout();
        return redirect('/');
    }
    public function aboutSliderUpdate(Request $request, $id)
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

    public function CandidateProfile()
    {

        return view('candidates.pages.candidateProfile');
    }

    public function CandidateChangePassword(Request $request)
    {
        try {
          $oldPassword = $request->input('oldPassword');
          $newPassword = $request->input('newPassword');

          $user = User::find(auth()->user()->id);
          if (Hash::check($oldPassword, $user->password)) {
            $user->password = Hash::make($newPassword);
            $user->save();
            return redirect()->back()->with('success', 'Password Changed Successfully');
          } else {
            return redirect()->back()->with('warning', 'Old Password Not Matched');
          }

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    /// companies change password
    function CompanyProfile(){
        return view ('companies.pages.acountProfile');
    }
function CompanyChangePassword(Request $request){
    try {
        $oldPassword = $request->input('oldPassword');
        $newPassword = $request->input('newPassword');

        $user = User::find(auth()->user()->id);
        if (Hash::check($oldPassword, $user->password)) {
          $user->password = Hash::make($newPassword);
          $user->save();
          return redirect()->back()->with('success', 'Password Changed Successfully');
        } else {
          return redirect()->back()->with('warning', 'Old Password Not Matched');
        }

      } catch (Exception $e) {
          return $e->getMessage();
      }
}

function CanchangeStatus(Request $request)
{
    //dd($request->all());
   $job = Job::find($request->job_id);

   $job->status = $request->status;
   $job->save();
    
    return redirect()->back()->with('success', 'User Status Changed Successfully');
}

}
