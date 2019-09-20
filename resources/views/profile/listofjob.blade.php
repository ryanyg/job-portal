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
                        <a href="{{route('user.profile')}}">My Profile</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('profile.listofjob')}}">List of Jobs</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('profile.listofcompany')}}">List of companies</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9"><br>
            <div class="card">
                <div class="card-header" style="background-color: #f75e22; color: white;">List of Jobs</div>
                <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline" style="float:right;">
                              <input class="form-control mr-sm-2" type="search" placeholder="Search Job .." aria-label="Search">
                              <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" style="background-color: #FD8971; color: white;">Search</button>
                            </form><br><br>
                        </div>  
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Job Position</th>
                                        <th>Company</th>
                                    </tr>
                                </thead>
                                @foreach($jobs as $job)
                                <tbody>
                                    <tr>
                                        <td>{{date('M d Y', strtotime($job->created_at))}}</td>
                                        <td>
                                            <a href="{{route('jobs.show',[$job -> id , $job ->position])}}">
                                                {{$job -> position}}
                                            </a>
                                        </td>
                                        <td>{{$job -> company -> company_name}}</td>
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
    </div>
</div>


@endsection
