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
                            <a href="{{route('company.profile')}}">My Company Profile</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('jobs.create')}}">Job Posting</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('jobs.myjob')}}">List of my Job Posting</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('jobs.applicant') }}">List of Applicants</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9"><br>
            <div class="card">
                <div class="card-header" style="background-color: #f75e22; color: white;">Job Vacancy Information</div>
               
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($applicants->count() > 0)
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-inline" action="" method="GET"  style="float:right;">
                                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Enter a Job Position"/>
                                    <input class="btn btn-warning my-2 my-sm-0" type="submit" value="Search"/ style="background-color: #FD8971; color: white;">
                                </form> 
                            </div>  
                        </div>

                        <div class="card">
                            <div class="card-header" style="background-color: #f75e22; color: white;">
                                {{ $company->company_name }}
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>List of qualified applicants</h4>
                                            @foreach($applicants as $user)
                                                <table class="table" style="border: 1px solid red;">
                                                    <thead>
                                                        <tr>
                                                            <th>Photo</th>
                                                            <th>Full name</th>
                                                            <th>Educational Attainment</th>
                                                            <th>Work Experience</th>
                                                            <th>Skill</th>
                                                            <th>Gender</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td width="5%">
                                                                <img src="{{asset('uploads/avatar')}}/{{$user->avatar}}" width="100" height="100">
                                                            </td>
                                                            <td width="5%">
                                                                {{$user -> f_name}}&nbsp;{{$user -> l_name}}
                                                            </td>
                                                            <td width="30%">
                                                                <ul>
                                                                    <li>{{$user -> edu_attainment}}</li>
                                                                    <li>School: {{$user -> school}}</li>
                                                                    <li>Field of study: {{$user -> field_of_study}}</li>
                                                                    <li>Date Graduated: {{date('M-d-Y', strtotime($user -> date_graduated))}}</li>
                                                                </ul>
                                                            </td>
                                                            <td width="20%">
                                                                <ul>
                                                                    <li>Position: {{$user -> work_position}}</li>
                                                                    <li>Company: {{$user -> work_company}}</li>
                                                                    <li>Year Exp: {{$user -> work_year_experience}}</li>
                                                                </ul>
                                                            </td>
                                                            <td width="20%">
                                                                {{$user -> skill}}
                                                            </td>
                                                            <td width="5%">
                                                                {{$user -> gender}}
                                                            </td>
                                                            <td width="15%">
                                                                <a href="{{route('company.status', ['hired', $user -> job_user_id] )}}">
                                                                    <button class="btn btn-qualify btn-sm">Hired</button>
                                                                </a>
                                                                <a href="{{route('company.status', ['not-hired', $user -> job_user_id] )}}">
                                                                    <button class="btn btn-secondary btn-sm">Not Hired</button>
                                                                </a>                                                                    <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg1">
                                                                    Report
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                        <!-- Modal report applicant -->
                                                        <form action="{{route('company.status', ['reported', $user -> job_user_id] )}}" method="GET">
                                                            @csrf
                                                            <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class ="row">
                                                                                <div class="col-md-12 form-group">
                                                                                    <label>Reason</label>
                                                                                    <textarea name="reason" class="form-control" required  placeholder="Enter a Reason">
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @endforeach
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