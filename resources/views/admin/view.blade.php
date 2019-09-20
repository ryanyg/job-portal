@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                       <a href="{{route('admin.index')}}">Home</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.applicants')}}">Referral</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.listofcompany')}}">Companies</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('admin.jobs')}}">View Jobs</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.referApplicants') }}">Refer Applicants</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.reportedApplicants') }}">Reported Applicants</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.blockedApplicants') }}">Blocked Applicants</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('company.register') }}">Add Company</a>
                    </li>
                </ul>
            </div>
        </div>       
        <div class="col-md-9"><br>
            <div class="row">
                <div class="col-md-12"> 
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                        <div class="card">
                            @foreach($applicants as $applicant)
                            <div class="card-header" style="background-color: #f75e22; color: white;">
                                @foreach($applicant -> users as $user)
                                {{$user -> f_name}}
                                @endforeach
                            </div>
                            <div class="card-body">
                            </div>
                            @endforeach
                        </div><br>
                    </div>
                </div><br>
        </div>
    </div>
</div>
@endsection

<style>
    .btn-qualify{
        background-color: #FD8971;
        color: white;
    }
</style>