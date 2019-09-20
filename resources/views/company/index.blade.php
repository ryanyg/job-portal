    @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="margin-top: 20px;">
                @if(empty($company->logo))
                    <img src="{{asset('avatar/ry.jpg')}}" height="350" style="width: 100%; margin-bottom: 15px;">
                @else
                    <img src="{{asset('uploads/logo')}}/{{$company ->logo}}" height="350" style="width: 100%; margin-bottom: 15px;">
                @endif
            </div>
            <div class="card" style="border: none;">
                <div class="card-body" style="border: 1px solid black; margin-bottom: 15px;">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>
                                {{$company -> company_name}}
                            </h1><br>
                            <h5>Office address</h5>
                            <p>{{$company -> address}}</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Industry</h5>
                                    <p>{{$company -> industry}}</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Website</h5>
                                    <a href="http://{{$company -> website}}">{{$company -> website}}</a>
                                    <p></p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Social media</h5>
                                    <p>facebook</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body"  style="border: 1px solid black;  margin-bottom: 15px;">
                    <h2>About</h2>
                        <p>{{$company -> description}}</p>
                    </div>

                <div class="card-body"  style="border: 1px solid black;">
                    <h2 style="margin-bottom: 15px;">Job Vacancy</h2>
                    @foreach($company -> jobs as $job)
                    <div class="row">
                        <div class="col-md-10">
                            <h3>{{$job -> position}}</h3>
                            <p style="color: red;">
                                Posted: {{ date('M-d-Y', strtotime($job -> created_at))}}<br>
                                    No. of Job Vacancy ({{$job -> number_vacancy}})
                            </p>
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <a href="{{route('jobs.show',[$job -> id , $job ->position])}}">
                                <button class="btn btn-primary">
                                    View Job
                                </button>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
</style>