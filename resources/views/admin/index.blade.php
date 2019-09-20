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
                    <li class="list-group-item">
                        <a href="">View Employment Report</a>
                    </li>
                </ul>
            </div>
        </div>    
        <div class="col-md-9">
        </div>
    </div>
</div>
@endsection