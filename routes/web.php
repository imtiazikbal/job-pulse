<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeViewController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\CandidateSkillController;
use App\Http\Controllers\CompanyContactController;
use App\Http\Controllers\CandidateSalaryController;
use App\Http\Controllers\Backend\CandidatesController;
use App\Http\Controllers\Backend\ComapaniesController;
use App\Http\Controllers\CandidateExperienceController;
use App\Http\Controllers\CandidateEducationDetailsController;
use App\Http\Controllers\CandidateProfessionalTrainingController;



Route::get('/welcome', function () 
{return view('welcome');
});
Route::get('/dashboard', function () {
    switch (auth()->user()->role) {
        case 'admin':
            return redirect('/admin/dashboard');
        // return redirect('/dashboard');

        case 'companies':
            return redirect('/companies/dashboard');

        case 'candidates':
            return redirect('/candidates/dashboard');

        default:
            return redirect('/');

    }

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    Route::get('/companies/dashboard', [ComapaniesController::class, 'index']);
    Route::get('/candidates/dashboard', [CandidatesController::class, 'index']);

//company profile create
//Route::view('/profilepage','companies.pages.profile-page');

    Route::get('/company/profile/create', [CompanyController::class, 'profile'])->name('company.profile');
    Route::get('/company/profile/edit/{company}', [CompanyController::class, 'ProfileEdit'])->name('company.profile');
Route::post('/company/profile/edit/update/{company}', [CompanyController::class, 'ProfileUpdate'])->name('company.profile');
    
    Route::get('/profilepage', [CompanyController::class, 'companyProfile']);
    Route::get('/company/profile/update', [CompanyController::class, 'updateCompanyProfile'])->name('company.update');
    Route::get('/profile/delete', [CompanyController::class, 'deleteCompanyProfile'])->name('company.delete');

// Comapany Contact Create
//Route::view('/contactpage', 'companies.pages.contact-page');

    Route::get('/contactpage', [CompanyContactController::class, 'contactPage'])->name('company.contact.create');
    Route::get('/company/contact/create', [CompanyContactController::class, 'create'])->name('company.contact.create');
   
    Route::get('/company/contact/update', [CompanyContactController::class, 'update'])->name('company.contact.create');
    //profile account Candidate
    Route::get('/Candidate/profile/page', [AdminController::class, 'CandidateProfile']);
    Route::post('/candidate/change/password', [AdminController::class, 'CandidateChangePassword']);

//Companies profile
    Route::get('/company/profile/page', [AdminController::class, 'CompanyProfile']);
    Route::post('/company/change/password', [AdminController::class, 'CompanyChangePassword']);

//Copany post job

    Route::get('/jobs', [JobController::class, 'jobs']);
    Route::view('/jobsCreatePage', 'companies.pages.job.create');
    Route::post('/job/store', [JobController::class, 'jobStore'])->name('job.store');

    Route::get('/job/edit/{id}', [JobController::class, 'edit'])->name('job.edit');
    Route::get('/job/update', [JobController::class, 'jobUpdate'])->name('job.update');
    Route::post('/job/delete/{id}', [JobController::class, 'jobDelete'])->name('job.delete');
// who applied in the job
    Route::get('/whoApllied', [JobController::class, 'whoApplied'])->name('who.aplied');
    Route::get('/viewProfile', [JobController::class, 'viewProfile'])->name('viewProfile');
    Route::get('/details/appliedJob', [CompanyController::class, 'appliedJobDetails'])->name('details');
    Route::get('/companies/shortlisted/user',[JobController::class,'shortlistedUser']);
//create candidate
    Route::get('/candidate/profile/create', [CandidateController::class, 'profile'])->name('candidate.profile');
    Route::get('/candidate/profile/update', [CandidateController::class, 'updateprofile'])->name('candidate.profile.update');
//Route::post('/candidateStore',[CandidateController::class,'candidateStore']);
//applied job candidate
    Route::post('/applied/job', [CandidateController::class, 'appliedJob'])->name('applied.job');
    Route::get('/salaryPage', [CandidateSalaryController::class, 'salaryPage'])->name('salary.page');
    Route::get('/appliedJobPage', [CandidateController::class, 'appliedJobPage'])->name('applied.job.page');
    Route::get('/shortlistJobs',[CandidateController::class, 'shortlistJobs']);
// Candidate Education Store
    Route::get('/educationCreatePage',[CandidateEducationDetailsController::class, 'educationCreatePage'])->name('education.create.page');
    Route::post('/candidate/education/store', [CandidateEducationDetailsController::class, 'educationStore'])->name('education.store');
    Route::post('/candidate/education/delete/{education}', [CandidateEducationDetailsController::class, 'educationDelete'])->name('education.store');
    
    // Candidate Job Experience
    Route::get('job/experience',[CandidateExperienceController::class, 'jobExperience']);
    Route::POST('/candidate/job/experience/create', [CandidateExperienceController::class, 'jobExperienceCreate'])->name('candidate.job.experience');
    Route::POST('/experience/delete/{experience}', [CandidateExperienceController::class, 'jobExperienceDelete'])->name('candidate.job.experience');
    
/// Professional Training
    Route::get('job/traning', [CandidateProfessionalTrainingController::class, 'jobTraning']);
    Route::get('//traing/index', [CandidateProfessionalTrainingController::class, 'trainingIndex']);
    Route::post('/candidate/training/create', [CandidateProfessionalTrainingController::class, 'trainingCreate'])->name('candidate.training.create');
    Route::post('/training/delete/{training}', [CandidateProfessionalTrainingController::class, 'trainingDelete']);
    
//skill

    Route::get('/candidate/skill/page',[CandidateSkillController::class, 'candidateSkillPage'])->name('skill.page');
    Route::post('/candidate/skill/create', [CandidateSkillController::class, 'Create']);
    Route::post('/candidate/skill/delete/{skill}', [CandidateSkillController::class, 'Delete']);

//admin job

    Route::get('/admin/companies', [AdminController::class, 'AdminCompanies']);

    ///company
    Route::post('/shortlisted/candidate', [JobController::class, 'shortlisted'])->name('shortlist.candidate');

});

Route::post('/candidate/store', [CandidateController::class, 'store'])->name('candidate.store');

//login
Route::get('/candidate/login', [CandidateController::class, 'candidateLogin'])->name('candidate.login');
Route::view('/candidate/loginPage', 'candidates.pages.login-page');

// Company Profile Create
Route::get('/company/store', [CompanyController::class, 'store'])->name('company.store');

// Route::get('/companyLogin', [CompanyController::class, 'companyLogin'])->name('companyLogin');
// Route::view('company/loginPage', 'companies.pages.login-page');

///details here

Route::get('/details', [CompanyController::class, 'companyDetails'])->name('details');
Route::get('/candidate/details', [CandidateController::class, 'candidateDetails'])->name('candidate.details');

///view here
Route::view('/candidate/register', 'candidates.pages.registration-page');
Route::view('/companies/register', 'companies.pages.registration-page');
Route::get('/app', [HomeViewController::class, 'index']);
Route::get('/analytics', [CompanyController::class, 'totalAppliedCount'])->name('totalAppliedCount');
Route::get('/logout01', [AdminController::class, 'logout01']);

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');

    Route::post('/about/slider/store', [AboutPageController::class, 'aboutSliderStore']);
    Route::get('/store/slider/edit/{AboutData}', [AdminController::class, 'aboutSliderStoreEdit']);
    Route::post('/aboutSliderUpdate/{id}', [AdminController::class, 'aboutSliderUpdate']);

    Route::post('/store/slider/about/update/{id}', [AdminController::class, 'storeSliderUpdateabout']);
    Route::post('/status/update/about/{slider}', [AdminController::class, 'updateSliderStatusAbout']);
    Route::post('/delete/slider/about/{slider}', [AdminController::class, 'deleteSliderStatusAbout']);
    Route::post('/store/slider', [AdminController::class, 'storeSlider']);
    Route::post('/store/slider/update/{id}', [AdminController::class, 'storeSliderUpdate']);
    Route::post('/store/slider/delete', [AdminController::class, 'storeSliderDelete']);

    Route::post('/admin/companies/delete/{id}', [AdminController::class, 'Companiesdelete']);
    
});





//admin routes
    Route::post('/admin/change/job/status', [AdminController::class, 'adminChangeJobStatus']);
    Route::post('/admin/jobs/delete/{id}', [AdminController::class, 'jobDelete']);
    Route::get('/candidateAppliedCount', [CandidateController::class, 'totalAppliedCount']);
//ajax get Route
Route::get('/admin/can/change/status', [AdminController::class, 'CanchangeStatus'])->name('change.status');

Route::get('/admin/jobs', [AdminController::class, 'AdminJobs']);

Route::get('/Pages', [AdminController::class, 'pegesHome']);

Route::get('/about', [AboutPageController::class, 'aboutPage']);
Route::get('/aboutPage/admin', [AdminController::class, 'aboutPageAdmin']);

//Job Page
Route::get('/allJobs', [JobPageController::class, 'allJobs']);
Route::get('/searchJob', [JobPageController::class, 'searchJob']);
//candidate applied jobs
Route::get('/totalAppliedCount', [CandidateController::class, 'totalAppliedCount']);

//contact
Route::get('/contact', [ContactPageController::class, 'contact']);
Route::get('/contact/mail', [ContactPageController::class, 'contactMail'])->name('contact.mail');

Route::get('/sliderPage', [HomeViewController::class, 'sliderPage']);

//Home job details page
Route::get('/jobdetailsPage', [JobPageController::class, 'jobdetailsPage']);


//fontend
Route::get('/',[HomeViewController::class,'app']);
Route::get('/findJobs',[JobPageController::class,'findJobs']);
Route::get('/JobsDetails',[JobPageController::class,'JobsDetails'])->name('JobsDetails');
Route::get('/jobs/filter/type',[JobPageController::class,'filterType']);
Route::get('/jobs/filter/location',[JobPageController::class,'filterLocation']);
Route::get('/jobs/filter/experience',[JobPageController::class,'filterExperience']);

//home page filter
Route::get('/jobs/filter/location/title',[JobPageController::class,'filterLocationTittle']);
Route::get('/jobs/filter/relevance/old',[JobPageController::class,'filterRelevanceOld']);
Route::get('/jobs/filter/category/type',[JobPageController::class,'filterCategoryType']);
Route::get('/jobs/filter/category/type/get',[JobPageController::class,'filterCategoryTypeGet'])->name('filterCategoryTypeGet');

/// super admin login
Route::view('/jobPulse','admin.pages.login');
require __DIR__ . '/auth.php';
