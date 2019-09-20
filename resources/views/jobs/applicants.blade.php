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
                <div class="card-header" style="background-color: #f75e22; color: white;">Applicants</div>
                @foreach($applicants as $applicant)
                    <div class="card-body">
                        <h4>{{$applicant -> category_id}}</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Job Position</td>
                                    <td>Number of Vacancy</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$applicant -> position}}</td>
                                    <td>{{$applicant -> number_vacancy}}</td>
                                </tr>
                            </tbody>
                        </table>
                            
                            

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection