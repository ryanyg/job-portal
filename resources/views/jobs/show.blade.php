@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
    </div>
</div>
<div class="container">
    <div class="col-md-12">
            <div class="card" style="border: 1px solid black;">
                <div class="card-header" style="background-color: white;">
                    <div class="row">
                        <div class="col-md-3">
                            @if(empty($job->company->logo))
                                <center>
                                    <img src="{{asset('avatar/ry.jpg')}}" class="img-thumbnail" width="150">
                                </center>
                            @else
                                <center>
                                    <img src="{{asset('uploads/logo')}}/{{$job -> company->logo}}" class="img-thumbnail mx-auto" width="200">
                                </center>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <a href="{{route('home')}}">
                                <button style="float: right; margin-right: 50px; margin-top: 10px; width: 100px;" class="btn btn-secondary">Back</button>
                            </a>
                            <h1  style="margin-top: 10px;">Position: {{$job -> position}}</h1>
                            <p>Company: <a href="{{route('company.index', [$job -> company -> id, $job ->company -> company_name])}}"> {{$job -> company -> company_name}}</a>
                            </p>
                            <p>Address: {{$job -> company -> address}}</p>
                            <p>Industry: {{$job -> company -> industry}}</p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <h4>Category</h4>
                            <ul>
                                <li>{{$job -> category}}</li>
                            </ul>
                            <h4>Job Description</h4>
                            <ul>
                                <li>{{$job -> description}}</li>
                            </ul>
                            <h4>Minumum requirements</h4>
                            <ul>
                                <li>{{$job -> skill}}</li>
                            </ul>
                            <h4>Educational Requirement</h4>
                            <ul>
                                <li>{{$job -> education}}</li>
                            </ul>
                            <h4>Gender</h4>
                            <ul>
                                <li>{{$job -> gender}}</li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h4>Date posted</h4>
                            <ul>
                                <li>{{ date('M d, Y', strtotime($job -> created_at))}}</li>
                            </ul>
                            <h4>Position Level</h4>
                            <ul>
                                <li>{{$job -> position_level}}</li>
                            </ul>
                            <h4>Work Schedule</h4>
                            <ul style="margin-bottom: 20px;">
                                <li>{{$job -> work_schedule}} </li>
                            </ul>

                            @if(Auth::check()&&Auth::user()->user_type =='seeker')
                                @if(!$job -> checkApplication())
                                    <button class="btn btn-primary" style="width: 100%;margin-bottom: 5px;">Save this job</button>
                                    <form action="{{route('apply', [$job -> id])}}" method="POSt">@csrf
                                        
                                        <button type="submit"class="btn btn-success" style="width: 100%;">Apply</button>
                                    </form>
                                @else
                                    <button type="submit"class="btn btn-secondary" style="width: 100%;" disabled="">Applied</button>
                                @endif
                            @elseif(Auth::check()&&Auth::user()->user_type =='company')
                                <button class="btn btn-danger" disabled="">Apply button is only for Job Seeker</button>
                            @elseif(Auth::check()&&Auth::user()->user_type =='')

                            
                            @else
                                <a href="{{route('login')}}">
                                    <button class="btn btn-danger">Please login to apply for a job</button>
                                </a>
                            @endif
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection