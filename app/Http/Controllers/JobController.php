<?php

namespace App\Http\Controllers;

use App\JobUser;
use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Admin;
use App\Http\Requests\JobPostRequest;
use Auth;
use App\Helper;
class JobController extends Controller
{
    
    //public function __construct()
    //{
    //    $this->middleware('company', ['except' => array('index', 'show' , 'apply')]);
    //}


    public function index()
    {
    	$jobs = Job::latest()->limit(5)->where('status',1)->get();

    	return view('welcome' , compact('jobs'));
    }

    public function show($id, Job $job)
    {
    	//$jobs = Job::find($id);
    	return view('jobs.show', compact('job'));
    }


    public function create()
    {
        return view('jobs.create');
    }


    public function store()
    {
        $user_id = auth() -> user() -> id;
        $company = Company::where('user_id', $user_id) -> first();
        $company_id = $company -> id;

        Job::create([

            'user_id' => $user_id,
            'company_id' => $company_id,
            'category' => request('category'),
            'position' => request('position'),
            'position_level' => request('position_level'),
            'number_vacancy' => request('number_vacancy'),
            'work_schedule' => request('work_schedule'),
            'description' => request('description'),
            'education' => request('education'),
            'work_experience' => request('work_experience'),
            'gender' => request('gender'),
            'status' => request('status'),
            'salary' => request('salary'),
            'skill' => request('skill'),

            

        ]);

        return redirect() -> back() -> with('message', 'Job Vacancy successfully added!');
    }

    public function archieve()
    {
        $user_id = auth() -> user() -> id;
        Job::where('user_id', $user_id) -> update ([

            'status' => 0,

        ]);

        return redirect() -> back() -> with('message', 'Archieve job!');
    }

    public function update(Request $request,$id)
    {
        $job = Job::findOrFail($id);
        $job -> update($request -> all());

        return redirect() -> back() -> with('message', 'Job Vacancy Succesfully Updated!');
    }

    public function myjob(Request $request)
    {
        if($request->has('search')) {
            $jobs = Job::where('user_id', auth() -> user() -> id)
                ->where('position', 'like', Helper::likeQuery($request['search']))
                ->paginate(10);
        }

        else {
            $jobs = Job::where('user_id', auth() -> user() -> id)
                -> paginate(10);
        }

        return view('jobs.myjob', compact('jobs'));
    }

    public function edit($id)
    {
        $jobs = Job::findOrFail($id);
        return view('jobs.edit',compact('jobs'));
    }

    public function apply(Request $request, $id)
    {
        $jobId = Job::find($id);
        $jobId -> users() -> attach(Auth::user() -> id);

        return redirect() -> back() -> with('message', 'Application sent!');
    }

    public function qualifiedApplicants(Request $request, $jobID) {

        $job = Job::findOrFail($jobID);
        $company = Company::findOrFail($job->company_id);

        if($request->has('search')) {
            $applicants = JobUser::where('job_id', $jobID)
                ->join('users', 'job_user.user_id', '=', 'users.id')
                ->join('profiles', 'job_user.user_id', '=', 'profiles.user_id')
                ->select('users.*', 'job_user.job_status', 'profiles.*')
                ->where('job_status', 'qualified')
                ->where('f_name', 'like', Helper::likeQuery($request['search']))
                ->paginate(5);
        }

        else {
            $applicants = JobUser::where('job_id', $jobID)
                ->join('users', 'job_user.user_id', '=', 'users.id')
                ->join('profiles', 'job_user.user_id', '=', 'profiles.user_id')
                ->select('users.*', 'job_user.job_status', 'job_user.id as job_user_id', 'profiles.*')
                ->where('job_status', 'qualified')
                ->paginate(5);
        }

        return view('jobs.view-applicants',compact('applicants', 'job', 'company'));
    }

}
