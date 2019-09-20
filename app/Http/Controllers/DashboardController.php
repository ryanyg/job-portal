<?php

namespace App\Http\Controllers;

use App\Helper;
use App\JobUser;
use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Admin;
use App\User;
use App\Http\Requests\JobPostRequest;
use Auth;
class DashboardController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }


    public function getAllJobs()
    {
    	$jobs = Job::latest() -> paginate(5);
    	return view('admin.job', compact('jobs'));
    }

    public function getAllCompany(Request $request)
    {
        
        if($request->has('search')) {
            $companies = Company::where('company_name', 'like', Helper::likeQuery($request['search']))
                ->paginate(10);
        }

        else {
            $companies = Company::limit(10)->orderBy('company_name')->paginate(2);
        }

        return view('admin.listofcompany' , compact('companies'));
    }
    
    public function getAllApplicant(Request $request)
    {

        if($request->has('search')) {
            $applicants = Job::where('position', 'like', Helper::likeQuery($request['search']))
                ->paginate(10);
        }

        else {
            $applicants = Job::paginate(10);
        }

        return view('admin.applicants', compact('applicants'));
    }

    public function viewApplicants(Request $request, $jobID) {

        $job = Job::findOrFail($jobID);
        $company = Company::findOrFail($job->company_id);

        if($request->has('search')) {
            $applicants = JobUser::where('job_id', $jobID)
                ->join('users', 'job_user.user_id', '=', 'users.id')
                ->join('profiles', 'job_user.user_id', '=', 'profiles.user_id')
                ->select('users.*', 'job_user.job_status', 'profiles.*')
                ->where('job_status', null)
                ->where('f_name', 'like', Helper::likeQuery($request['search']))
                ->paginate(5);
        }

        else {
            $applicants = JobUser::where('job_id', $jobID)
                ->join('users', 'job_user.user_id', '=', 'users.id')
                ->join('profiles', 'job_user.user_id', '=', 'profiles.user_id')
                ->select('users.*', 'job_user.job_status', 'job_user.id as job_user_id', 'profiles.*')
                ->where('job_status', null)
                ->paginate(5);
        }

        return view('admin.view-applicants', compact('applicants', 'job', 'company'));
    }

    public function qualify($status, $id)
    {
        $applicant = JobUser::findOrFail($id);

        $applicant->job_status = $status;
        $applicant->save();

        return back()->with('message', 'Successfully updated!');
    }




    public function getAllApplicantz()
    {
        $applicants = Job::all();
        return view('admin.view', compact('applicants'));
    }


    public function reportedApplicants() {

        $applicants = JobUser::where('job_status', 'reported')
            ->paginate(5);

        return view('admin.reported-applicants', compact('applicants'));
    }

    public function blockApplicants($userID) {

        $jobs = JobUser::where('user_id', $userID)
            ->get();

        foreach($jobs as $job) {
            $job->job_status = "blocked";
            $job->save();
        }

        $user = User::findOrFail($userID);
        $user->account_status = "blocked";
        $user->save();

        return back()->with('message', 'Successfully blocked!');

    }

    public function unblockApplicants($userID) {

        $jobs = JobUser::where('user_id', $userID)
            ->get();

        foreach($jobs as $job) {
            $job->job_status = null;
            $job->reason = null;
            $job->save();
        }

        $user = User::findOrFail($userID);
        $user->account_status = null;
        $user->save();

        return back()->with('message', 'Successfully un-blocked!');

    }

    public function blockedApplicants() {

        $applicants = JobUser::where('job_status', 'blocked')
            ->groupBy('user_id')
            ->paginate(5);

        return view('admin.blocked-applicants', compact('applicants'));
    }

    public function referApplicants() {

        $companies = Company::all();
        $jobs = Job::all();

        $applicants = JobUser::where('job_status', 'not-hired')
            ->groupBy('user_id')
            ->paginate(5);

        return view('admin.refer-applicants', compact('applicants', 'companies', 'jobs'));

    }

    public function referApplicant(Request $request) {

        $checker = JobUser::where('user_id', $request['user'])
            ->where('job_id', $request['job'])
            ->get();

        if($checker->count() == 0) {

            $job = new JobUser();
            $job->job_id = $request['job'];
            $job->user_id = $request['user'];
            $job->job_status = "qualified";
            $job->save();

            return back()->with('success', 'Successfully referred!');
        }

        else {
            return back()->with('failed', 'The applicant is already referred to this company and job!');
        }

    }

    public function edit($id)
    {

        $jobs = Job::findOrFail($id);
        return view('admin.edit',compact('jobs'));

    }


}
