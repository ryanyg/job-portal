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

                            <div class="card-header" style="background-color: #f75e22; color: white;">
                                List of reported applicants
                            </div>

                            <div class="card-body">

                            @if($applicants->count() > 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table" style="border: 1px solid red;">
                                            <thead>
                                                <tr>
                                                    <th>Company Name</th>
                                                    <th>Applicant Name</th>
                                                    <th>Reason</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($applicants as $applicant)
                                                    <tr>
                                                        <td width="20%">
                                                            {{ \App\Company::findOrFail(\App\Job::findOrFail($applicant->job_id)->company_id)->company_name }}
                                                        </td>
                                                        <td width="25%">
                                                            {{ \App\User::findOrFail($applicant->user_id)->f_name }} {{ \App\User::findOrFail($applicant->user_id)->l_name }}
                                                        </td>
                                                        <td width="50%">
                                                            {{ $applicant->reason }}
                                                        </td>
                                                        <td width="5%">
                                                            <a href="{{ route('admin.blockApplicants', [ $applicant->user_id ] ) }}">
                                                                <button class="btn btn-qualify btn-sm">Block</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            @else

                                <div class="alert alert-danger">
                                    No applicant found!
                                </div>

                            @endif
                            </div>
                        </div>

                            <br>

                            {{ $applicants->links() }}
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