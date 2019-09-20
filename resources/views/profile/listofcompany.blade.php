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
                <div class="card-header" style="background-color: #f75e22; color: white;">List of Companies</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline" style="float:right;">
                              <input class="form-control mr-sm-2" type="search" placeholder="Search company .." aria-label="Search">
                              <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" style="background-color: #FD8971; color: white;">Search</button>
                            </form><br><br>
                        </div>  
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company name</th>
                                        <th  style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                @foreach($companies as $company)
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{asset('uploads/logo')}}/{{$company->logo}}" width="100" height="100"> 
                                            <a href="{{route('company.index' , [$company->id, $company -> company_name])}}">{{$company -> company_name}}</a></td>
                                        <td>
                                            <center>
                                                <br>
                                            <a href="{{route('company.index' , [$company->id, $company -> company_name])}}">
                                                <button class="btn btn-cdc btn-md">View</button>
                                            </a></center>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>  
                        <div class="col-md-12 text-center" >                            <p>
                            {{$companies -> links()}}</p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
