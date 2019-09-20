<?php

namespace App\Http\Controllers;

use App\JobUser;
use Illuminate\Http\Request;
use App\User;
use App\Company;
class CompanyController extends Controller
{


    public function __construct()
    {
        $this->middleware('company', ['except' => array('index')]);
    }

    public function index($id, Company $company)
    {
    	return view('company.index', compact('company'));
    }

    public function create()
    {
    	return view('company.create');
    }

    public function store(Request $request)
    {
    	//$this -> validate($request, [
		//	'phone_number' => 'required|regex:/(09)[0-9]{9}/',
			//'phone_number' => 'required|min:11|numeric',
		//]);

    	$user_id = auth() -> user() -> id;
    	User::where('id', $user_id) -> update ([

    		'email' => request('email'),
    	]);

    	Company::where('user_id', $user_id) -> update ([
    		'company_name' => request('company_name'),
    		'crte' => request('crte'),
    		'validity' => request('validity'),
    		'address' => request('address'),
    		'industry' => request('industry'),
    		'website' => request('website'),
    	]);

    	return redirect() -> back() -> with('message', 'Company info Succesfully Updated!');
    }

    public function storeCompRep(Request $request)
    {
    	//$this -> validate($request, [
		//	'phone_number' => 'required|regex:/(09)[0-9]{9}/',
			//'phone_number' => 'required|min:11|numeric',
		//]);

        $user_id = auth() -> user() -> id;
    	Company::where('user_id', $user_id) -> update ([
    		'rep_fullname' => request('rep_fullname'),
    		'rep_position' => request('rep_position'),
    		'rep_email' => request('rep_email'),
    		'rep_contact' => request('rep_contact'),
    	]);

    	return redirect() -> back() -> with('message', 'Company Representative Succesfully Updated!');
    }


    public function logo(Request $request)
	{
		$this -> validate($request,[
			'logo' => 'required|mimes:png,jpeg,jpg|max:20000'
		]);

	   	$user_id = auth() -> user() -> id;
	   	if($request -> hasfile('logo')){
	   		$file = $request -> file('logo');
	   		$ext = $file -> getClientOriginalExtension();
	   		$filename = time().'.'.$ext;
	   		$file -> move('uploads/logo/',$filename);
	   	}
	   	Company::where('user_id', $user_id) -> update([
	   			'logo' => $filename
	   	]);
        
	   	return redirect() -> back() -> with('message','Company Logo successfully updated!');
	}

	public function applicantStatus(Request $request, $status, $jobUserId) {
        $job = JobUser::findOrFail($jobUserId);
        $job->job_status = $status;
        $job->reason = $request['reason'];
        $job->save();

        return back()->with('message', 'Successfully updated!');
    }



}
