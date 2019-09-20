<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Hash;


class CompanyRegisterController extends Controller
{


	protected $redirectTo = '/company/register-representative';



    public function companyRegister()
    {
    	$user = User::create([

            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);

    	Company::create([

            'user_id' => $user -> id,
            'company_name' => request('company_name'),
            'crte' => request('crte'),
            'validity' => request('validity'),
            'description' => request('description'),
            'industry' => request('industry'),
            'address' => request('address'),
            'website' => request('website'),

        ]);

        

    	return redirect()-> back() -> with('message', 'Please verify your email by clicking the link sent to your email address! Proceed to login thankyou..');
    }
}
