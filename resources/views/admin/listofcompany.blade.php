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
                <div class="card-header" style="background-color: #f75e22; color: white;">List of Companies
                </div>
                <div class="card-body">
                    <div class="row"  style="float:right;">
                        <div class="col-md-12">

                            <form class="form-inline" action="{{ route('admin.listofcompany') }}" method="GET">
                                <input  class="form-control mr-sm-2" type="text" name="search" placeholder="Enter a Company"/>
                                <input class="btn btn-warning my-2 my-sm-0" type="submit" value="Search"/ style="background-color: #FD8971; color: white;">
                            </form> 
                        </div>  
                    </div>
                    <br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Company name</th>
                                <th>Industry</th>
                                <th>Date added</th>
                            </tr>
                        </thead>
                        @foreach($companies as $company)
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{asset('uploads/logo')}}/{{$company->logo}}" width="100" height="100"> 
                                    <a href="{{route('company.index' , [$company->id, $company -> company_name])}}">{{$company -> company_name}}</a></td>
                                <td>{{$company -> industry}}
                                </td>
                                <td>
                                    {{Auth::user()->created_at ->format('M d, Y')}}
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    
                        {{$companies -> links()}}
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
