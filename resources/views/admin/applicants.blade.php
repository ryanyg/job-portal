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
                        <div class="card-header" style="background-color: #f75e22; color: white;">Jobs</div>
                        <div class="card-body">
                            <div class="row"  >
                                
                            @if($applicants->count() > 0)
                                <div class="col-md-12" >
                                    <form class="form-inline" action="{{ route('admin.applicants') }}" method="GET"style="float:right;">
                                        <input  class="form-control mr-sm-2" type="text" name="search" placeholder="Enter a Job Position"/>
                                        <input class="btn btn-warning my-2 my-sm-0" type="submit" value="Search"/ style="background-color: #FD8971; color: white;">
                                    </form> 
                                </div>  
                            </div>


                            @foreach($applicants as $applicant)
                                <div class="card">

                                    @if(Session::has('message'))
                                        <div class="alert alert-success">
                                            {{Session::get('message')}}
                                        </div>
                                    @endif
                                    <div class="card-header" style="background-color: #f75e22; color: white;">
                                        {{$applicant -> company -> company_name}}
                                        <span> <span style="float: right"> ( {{$applicant -> category}} )</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Qualifications</h4>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Job position</th>
                                                            <th scope="col">Job description</th>
                                                            <th scope="col">Education attainment</th>
                                                            <th scope="col">Work Experience</th>
                                                            <th scope="col">Gender</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$applicant -> position}}</td>
                                                            <td>{{$applicant -> description}}</td>
                                                            <td>{{$applicant -> education}}</td>
                                                            <td>{{$applicant -> work_experience}}</td>
                                                            <td>{{$applicant -> gender}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-qualify btn-sm">
                                                    <a style="text-decoration: none; color:white" href="{{ route('admin.viewApplicants' , $applicant->id) }}">
                                                        View Applicants
                                                    </a>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <br>

                                @endforeach

                                {{ $applicants->links() }}

                                @else

                                    <div class="alert alert-danger">
                                        No job found!
                                    </div>

                                @endif
                            </div>
                        </div>
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