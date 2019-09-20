@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{route('home')}}">Home</a>
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

                    <div class="row"  style="float:right;">


                        <div class="col-md-12">
                            <form class="form-inline" action="" method="GET">
                                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Enter a Job Position"/>
                                <input class="btn btn-warning my-2 my-sm-0" type="submit" value="Search"/ style="background-color: #FD8971; color: white;">
                            </form> 
                        </div>  
                    </div>
                    <br><br>
                    @if($jobs->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Job Vacancy</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        @foreach($jobs as $job)
                            <tbody>
                                <tr>
                                    <td width="70%">
                                        <h2><a href="{{route('jobs.show',[$job -> id , $job ->position])}}">{{$job -> position}}</a></h2>
                                        <p>{{$job -> company_name}}</p>
                                        <p>Posted: {{ date('M-d-Y', strtotime($job -> created_at))}}</p>
                                        <p>No. of Job Vacancy ({{$job -> number_vacancy}})</p>
                                    </td>
                                    <td>
                                        <a href="{{route('jobs.show',[$job -> id , $job ->position])}}"><button class="btn btn-primary btn-sm">View</button></a>
                                        <a href="{{route('jobs.edit', [$job -> id])}}">
                                            <button class="btn btn-success btn-sm">Edit</button>
                                        </a>
                                            <a href="{{route('jobs.archieve', [$job -> id])}}">
                                                <button class="btn btn-danger btn-sm">Archieve</button>
                                            </a>
                                        <a href="{{route('jobs.applicants', [$job -> id])}}">
                                            <button class="btn btn-danger btn-sm">Applicants</button>
                                        </a>

                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    @else
                        <div class="alert alert-danger">
                            No job found!
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-9">
                            
                        </div>
                        <div class="col-md-3 text-center">
                            <br>
                        </div>
                    </div>
                    {{ $jobs->links() }}
                </div>
             </div>   
        </div>
    </div>
</div>

@endsection
