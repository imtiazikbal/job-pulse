<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeViewController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\CandidateSkillController;
use App\Http\Controllers\CompanyContactController;
use App\Http\Controllers\CandidateSalaryController;
use App\Http\Controllers\Backend\CandidatesController;
use App\Http\Controllers\Backend\ComapaniesController;
use App\Http\Controllers\CandidateExperienceController;
use App\Http\Controllers\CandidateEducationDetailsController;
use App\Http\Controllers\CandidateProfessionalTrainingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });
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

Route::get('/profilepage', [CompanyController::class, 'companyProfileEdit']);
Route::get('/company/profile/update', [CompanyController::class, 'updateCompanyProfile'])->name('company.update');
Route::get('/profile/delete', [CompanyController::class, 'deleteCompanyProfile'])->name('company.delete');






// Comapany Contact Create
//Route::view('/contactpage', 'companies.pages.contact-page');

Route::get('/contactpage', [CompanyContactController::class, 'contactPage'])->name('company.contact.create');
Route::get('/company/contact/create', [CompanyContactController::class, 'create'])->name('company.contact.create');
Route::get('/company/contact/update', [CompanyContactController::class, 'update'])->name('company.contact.create');


//Copany post job

Route::get('/jobs', [JobController::class, 'jobs']);
Route::view('/jobsCreatePage', 'companies.pages.job.create');
Route::get('/job/store', [JobController::class, 'jobStore'])->name('job.store');
Route::get('/job/edit/{id}', [JobController::class, 'edit'])->name('job.edit');
Route::get('/job/update', [JobController::class, 'jobUpdate'])->name('job.update');
Route::post('/job/delete/{id}', [JobController::class, 'jobDelete'])->name('job.delete');
// who applied in the job
Route::get('/whoApllied',[JobController::class,'whoApplied'])->name('who.aplied');
Route::get('/viewProfile',[JobController::class,'viewProfile'])->name('viewProfile');
Route::get('/details/appliedJob', [CompanyController::class, 'appliedJobDetails'])->name('details');
//create candidate
Route::get('/candidate/profile/create', [CandidateController::class, 'profile'])->name('candidate.profile');
Route::get('/candidate/profile/update', [CandidateController::class, 'updateprofile'])->name('candidate.profile.update');
//Route::post('/candidateStore',[CandidateController::class,'candidateStore']);
//applied job candidate
Route::post('/applied/job', [CandidateController::class, 'appliedJob'])->name('applied.job');
Route::get('/salaryPage', [CandidateSalaryController::class, 'salaryPage'])->name('salary.page');
Route::get('/appliedJobPage', [CandidateController::class, 'appliedJobPage'])->name('applied.job.page');

// Candidate Education Store
Route::view('/educationCreatePage', 'candidates.pages.education');
Route::post('/candidate/education/store', [CandidateEducationDetailsController::class, 'educationStore'])->name('education.store');
// Candidate Job Experience
Route::view('job/experience', 'candidates.pages.experience');
Route::POST('/candidate/job/experience/create', [CandidateExperienceController::class, 'jobExperienceCreate'])->name('candidate.job.experience');

/// Professional Training
Route::view('job/traning', 'candidates.pages.training');

Route::post('/candidate/training/create', [CandidateProfessionalTrainingController::class, 'trainingCreate'])->name('candidate.training.create');

//skill


Route::view('/candidate/skill/page','candidates.pages.skill');
Route::post('/candidate/skill/create', [CandidateSkillController::class, 'Create']);




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
Route::get('/',[HomeViewController::class,'index']);
Route::get('/analytics', [CompanyController::class, 'totalAppliedCount'])->name('totalAppliedCount');
Route::get('/logout01',[AdminController::class,'logout01']);
require __DIR__ . '/auth.php';
