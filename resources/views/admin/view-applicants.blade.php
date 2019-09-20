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
                        <div class="card">
                            <div class="card-header" style="background-color: #f75e22; color: white;">Applicants</div>
                            <div class="card-body">

                            @if($applicants->count() > 0) 
                                <div class="row">
                                    <div class="col-md" >
                                        
                                        <form class="form-inline" action="{{ route('admin.viewApplicants', $job->id) }}" method="GET"   style="float:right;">
                                            <input class="form-control mr-sm-2"type="text" name="search" placeholder="Enter a Name"/>
                                            <input class="btn btn-warning my-2 my-sm-0" type="submit" value="Search"/ style="background-color: #FD8971; color: white;">
                                        </form> 
                                    </div>  
                                </div>

                                <div class="card">
                                    
                                    @if(Session::has('message'))
                                        <div class="alert alert-success">
                                            {{Session::get('message')}}
                                        </div>
                                    @endif
                                    <div class="card-header" style="background-color: #f75e22; color: white;">
                                        {{ $company->company_name }}
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>List of applicants</h4>
                                                @foreach($applicants as $user)
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Photo</th>
                                                                <th scope="col">Full name</th>
                                                                <th scope="col">Educational Attainment</th>
                                                                <th scope="col">Work Experience</th>
                                                                <th scope="col">Skill</th>
                                                                <th scope="col">Gender</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <img src="{{asset('uploads/avatar')}}/{{$user->avatar}}" width="100" height="100">
                                                            </td>
                                                            <td>
                                                                {{$user -> f_name}}&nbsp;{{$user -> l_name}}
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    <li>{{$user -> edu_attainment}}</li>
                                                                    <li>School: {{$user -> school}}</li>
                                                                    <li>Field of study: {{$user -> field_of_study}}</li>
                                                                    <li>Date Graduated: {{date('M-d-Y', strtotime($user -> date_graduated))}}</li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    <li>Position: {{$user -> work_position}}</li>
                                                                    <li>Company: {{$user -> work_company}}</li>
                                                                    <li>Year Exp: {{$user -> work_year_experience}}</li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                {{$user -> skill}}
                                                            </td>
                                                            <td>
                                                                {{$user -> gender}}
                                                            </td>
                                                            <td>
                                                                <a href="{{route('admin.qualify', ['qualified', $user -> job_user_id] )}}">
                                                                    <button class="btn btn-qualify btn-sm">Qualified</button>
                                                                </a>
                                                                <a href="{{route('admin.qualify', ['not-qualified', $user -> job_user_id] )}}">
                                                                    <button class="btn btn-secondary btn-sm">Not Qualified</button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        {{ $applicants->links() }}

                        @else

                            <div class="alert alert-danger">
                                No applicant found!
                            </div>

                        @endif
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