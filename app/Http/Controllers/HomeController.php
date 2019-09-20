<?php

namespace App\Http\Controllers;

use App\JobUser;
use Illuminate\Http\Request;
use App\Profile;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this -> middleware(['auth', 'account']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adminRole = Auth::user() -> roles() -> pluck('name');

        if($adminRole -> contains('admin'))
        {
            return redirect('/dashboard');
        }

        $jobs = JobUser::where('user_id', auth()->user()->id)
            ->where(function($query){ $query
                ->where('job_status', 'hired')
                ->orWhere('job_status', 'not-hired');
            })
            ->get();


        return view('home', compact('jobs'));
    }

    public function addPersonalInfo()
    {
        $user = auth() -> user() -> id;

        Profile::where('user_id', $user) -> update([
            'phone_number' => request('phone_number'),
            'dob' => request('dob'),
            'address' => request('address'),
            'skill' => request('skill'),
        ]);

        return redirect() -> back() -> with('message', 'Profile Succesfully Updated!');
    }




}
