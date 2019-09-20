<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Company;
use App\Job;
use Auth;
class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('seeker');
    }


    public function index()
    {
    	return view('profile.index');
    }

    public function getAllCompany()
    {
        $companies = Company::limit(10)->orderBy('company_name')->paginate(5);
        return view('profile.listofcompany' , compact('companies'));
    }

    public function getAllJob()
    {

        $jobs = Job::latest()->where('status',1)->paginate(5);
        return view('profile.listofjob' , compact('jobs'));
    }

    public function store(Request $request)
    {
    	$this -> validate($request, [
			'phone_number' => 'required|regex:/(09)[0-9]{9}/',
			//'phone_number' => 'required|min:11|numeric',
		]);

    	$user_id = auth() -> user() -> id;
    	User::where('id', $user_id) -> update ([

    		'f_name' => request('f_name'),
    		'm_name' => request('m_name'),
    		'l_name' => request('l_name'),
    	]);

    	Profile::where('user_id', $user_id) -> update ([

    		'phone_number' => request('phone_number'),
    		'dob' => request('dob'),
    		'address' => request('address'),
    		'skill' => request('skill'),

    	]);

    	return redirect() -> back() -> with('message', 'Profile Succesfully Updated!');
    }

    public function storeEducation(Request $request)
    {
    	$user_id = auth() -> user() -> id;
    	Profile::where('user_id', $user_id) -> update ([

    		'edu_attainment' => request('edu_attainment'),
    		'school' => request('school'),
    		'field_of_study' => request('field_of_study'),
    		'date_graduated' => request('date_graduated'),

    	]);

    	return redirect() -> back() -> with('message', 'Educational background succesfully updated!');
    }

    public function storeWork(Request $request)
    {
    	$user_id = auth() -> user() -> id;
    	Profile::where('user_id', $user_id) -> update ([

    		'work_position' => request('work_position'),
    		'work_company' => request('work_company'),
    		'work_year_experience' => request('work_year_experience'),

    	]);

    	return redirect() -> back() -> with('message', 'Work experience succesfully updated!');
    }

    public function resume(Request $request)
	{
		$this -> validate($request,[
			'resume' => 'required|mimes:pdf,doc,docx|max:20000'
		]);

	   	$user_id = auth() -> user() -> id;
	   	$resume = $request -> file('resume') -> store('public/files');
	   	Profile::where('user_id', $user_id) -> update([
	   			'resume' => $resume
	   	]);
	   	return redirect() -> back() -> with('message','Resume Successfully Updated..');
	}

	public function avatar(Request $request)
	{
		$this -> validate($request,[
			'avatar' => 'required|mimes:png,jpeg,jpg|max:20000'
		]);
	   	$user_id = auth() -> user() -> id;
	   	if($request -> hasfile('avatar')){
	   		$file = $request -> file('avatar');
	   		$ext = $file -> getClientOriginalExtension();
	   		$filename = time().'.'.$ext;
	   		$file -> move('uploads/avatar/',$filename);
	   	}
	   	Profile::where('user_id', $user_id) -> update([
	   			'avatar' => $filename
	   	]);
	   	return redirect() -> back() -> with('message','Profile photo successfully updated!');
	}





}
