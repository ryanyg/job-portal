<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home' , 'HomeController@addPersonalInfo') -> name('add.personalInfo');

Route::get('/company', 'HomeController@index')->name('company');
Route::get('/' , 'JobController@index');

//jobs
Route::get('/jobs/{id}/{job}' , 'JobController@show') -> name('jobs.show');
Route::get('/jobs/create', 'JobController@create') -> name('jobs.create');
Route::post('/jobs/create' , 'JobController@store') -> name('jobs.store');
Route::get('/job/{id}/edit' , 'JobController@edit') -> name('jobs.edit');
Route::post('/job/{id}/edit' , 'JobController@update') -> name('jobs.update');
Route::get('/job/{id}/archieve' , 'JobController@archieve') -> name('jobs.archieve');
Route::get('/job/{id}/unarchieve' , 'JobController@unarchieve') -> name('jobs.unarchieve');
Route::get('/jobs/my-job' , 'JobController@myjob') -> name('jobs.myjob');
Route::get('/jobs/applicants/qualified/{jobID}' , 'JobController@qualifiedApplicants') -> name('jobs.applicants');


//user profile
Route::get('user/profile', 'UserController@index')->name('user.profile');
//user method post
Route::post('user/profile/create', 'UserController@store') -> name('profile.create');
Route::post('user/profile/create1', 'UserController@storeEducation') -> name('profile.updateEducation');
Route::post('user/profile/create2', 'UserController@storeWork') -> name('profile.updateWork');
Route::post('user/resume', 'UserController@resume') -> name('resume');
Route::post('user/avatar', 'UserController@avatar') -> name('avatar');
Route::get('user/listofcompany' , 'UserController@getAllCompany') -> name('profile.listofcompany');
Route::get('user/listofjob' , 'UserController@getAllJob') -> name('profile.listofjob');




//locator/company/employer
Route::get('company/{id}/{company}','CompanyController@index') -> name('company.index');
//comp register
Route::view('company/register', 'auth.employer-register') -> name('company.register');
Route::view('company/register-representative', 'auth.employerRep-register') ->name('compRep.register');
Route::post('company/register' , 'CompanyRegisterController@companyRegister') ->name('comp.register');
Route::get('company/create', 'CompanyController@create') -> name('company.profile');
Route::post('company/create', 'CompanyController@store') -> name('company.store');
Route::post('company/create-company-representative', 'CompanyController@storeCompRep') -> name('companyRep.store');
Route::post('company/create2', 'CompanyController@logo') -> name('company.logo');
Route::get('company/applicant/{status}/{jobID}', 'CompanyController@applicantStatus') -> name('company.status');

//apply
Route::get('/jobs' , 'JobController@jobs') -> name('jobs.applicant');
Route::post('/applications/{id}' ,'JobController@apply') -> name('apply');

//admin
Route::get('/dashboard' , 'DashboardController@index') -> name('admin.index')-> middleware('admin');
Route::get('/dashboard/jobs' , 'DashboardController@getAllJobs') -> name('admin.jobs')-> middleware('admin');
Route::get('/dashboard/jobs/{id}/edit' , 'DashboardController@edit') -> name('admin.edit')-> middleware('admin');

Route::get('/dashboard/applications', 'DashboardController@getAllApplicant') -> name('admin.applicants')-> middleware('admin');
Route::get('/dashboard/applications/{jobID}', 'DashboardController@viewApplicants') -> name('admin.viewApplicants')-> middleware('admin');

Route::get('/dashboard/applicants', 'DashboardController@showApplicant') -> name('admin.applicant')-> middleware('admin');

Route::get('/dashboard/applications/{status}/{userID}' ,'DashboardController@qualify') -> name('admin.qualify') -> middleware('admin');

Route::get('/dashboard/listofcompany' , 'DashboardController@getAllCompany') -> name('admin.listofcompany') -> middleware('admin');

Route::get('/dashboard/qualify', 'DashboardController@qualifiedApplicant') -> name('admin.qualified') -> middleware('admin');
Route::get('dashboard/reported/applicants' , 'DashboardController@reportedApplicants') -> name('admin.reportedApplicants')->middleware('admin');
Route::get('dashboard/blocked/applicants' , 'DashboardController@blockedApplicants') -> name('admin.blockedApplicants')->middleware('admin');
Route::get('dashboard/block/applicants/{userID}' , 'DashboardController@blockApplicants') -> name('admin.blockApplicants')->middleware('admin');
Route::get('dashboard/unblock/applicants/{userID}' , 'DashboardController@unblockApplicants') -> name('admin.unblockApplicants')->middleware('admin');
Route::get('dashboard/refer/applicants' , 'DashboardController@referApplicants') -> name('admin.referApplicants')->middleware('admin');
Route::post('dashboard/refer/applicant' , 'DashboardController@referApplicant') -> name('admin.referApplicant')->middleware('admin');

