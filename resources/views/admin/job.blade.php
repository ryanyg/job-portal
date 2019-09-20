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
            <div class="card">
                <div class="card-header" style="background-color: #f75e22; color: white;">
                    All Jobs
                </div>
                <div class="card-body">
                    <form class="form-inline" style="float: right;">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search company .." aria-label="Search">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" style="background-color: #FD8971; color: white;">Search</button>
                    </form>
                    <br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Created date</th>
                                <th>Position</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach ($jobs as $job)
                        <tbody>
                            <tr>
                                <td>{{date('M d, Y', strtotime($job -> created_at))}}</td>
                                <td>
                                   <a href="{{route('jobs.show',[$job -> id , $job ->position])}}">
                                        {{$job -> position}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('jobs.show',[$job -> id , $job ->position])}}">
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </a>
                                    <a href="{{route('admin.edit', [$job -> id])}}">
                                        {{$job -> id}}
                                        <button class="btn btn-success btn-sm">Edit</button>
                                    </a>

                                    <a href="{{route('jobs.archieve', [$job -> id])}}">
                                        <button class="btn btn-danger btn-sm">Archieve</button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    {{$jobs -> links()}}
                </div>
            </div>



        </div>


    </div>
</div>
@endsection