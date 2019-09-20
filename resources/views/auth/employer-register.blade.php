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
                        <a href="">Manage Applicant</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('admin.reportedApplicants') }}">Reported Applicants</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('company.register') }}">Add Company</a>
                    </li>
                </ul>
            </div>
        </div>  
        <div class="col-md-9"><br>
            <div class="row">
                <div class="col-md">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif 
                </div>
            </div>
            <div class="card">
                <div class="card-header" style="background-color: #f75e22; color: white;">{{ __('Company Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comp.register') }}">
                        @csrf
                        <input type="hidden" name="user_type" value="company">
                        <div id="first">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" required id="company_name" name="company_name" autocomplete="company_name" autofocus placeholder="Company name" class="form-control">
                                        @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="crte">{{ __('CRTE') }}</label>
                                        <input type="text" class="form-control @error('crte') is-invalid @enderror" name="crte" value="{{ old('crte') }}" required autocomplete="crte" autofocus placeholder="CRTE">
                                        @error('crte')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="validity">Validity</label>
                                        <input type="date" class="form-control @error('validity') is-invalid @enderror" name="validity" value="{{ old('validity') }}" required autocomplete="validity" autofocus placeholder="validity">
                                        @error('validity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('Company Description') }}</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">{{ __('Email Address') }}</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="slug" autofocus placeholder="Email Address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="industry">Industry</label>
                                        <select name="industry" class="
                                        form-control">
                                            @foreach(App\Industry::all() as $ind)
                                                <option value="{{$ind->name}}">{{$ind -> name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Address">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" name="website"required autocomplete="website" autofocus placeholder="Website">
                                        @error('website')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="border: 1px solid red;">
                        <button type="submit" class="btn btn-primary" id="reg_button" style="float:right;">
                            {{ __('Add Company') }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

