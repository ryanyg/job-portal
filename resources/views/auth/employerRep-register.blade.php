@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('company.profile')}}">Company Profile</a>
                            </li>
                            <li class="list-group-item">
                                <a href="">Add Job</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('compRep.register')}}">Add company Representative</a>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>   
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color: #f75e22; color: white;">{{ __('Company Representative') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store.compRep') }}">
                        @csrf
                        <div id="first">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="f_name">{{ __('Company Representative Full name') }}</label>
                                        <input id="rep_fullname" type="text" class="form-control @error('rep_fullname') is-invalid @enderror" name="rep_fullname" value="{{ old('rep_fullname') }}" required autocomplete="rep_fullname" autofocus placeholder="Full name">
                                        @error('rep_fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rep_position">{{ __('Company Position') }}</label>
                                        <input id="rep_position" type="text" class="form-control @error('rep_position') is-invalid @enderror" name="rep_position" value="{{ old('rep_position') }}" required autocomplete="rep_position" autofocus placeholder="Position">

                                        @error('Last name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rep_email">{{ __('E-Mail Address') }}</label>
                                        <input id="rep_email" type="email" class="form-control @error('email') is-invalid @enderror" name="rep_email" value="{{ old('rep_email') }}" required autocomplete="rep_email" placeholder="Email Address">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rep_contact">{{ __('Contact') }}</label>
                                        <input id="rep_contact" type="text" class="form-control @error('rep_contact') is-invalid @enderror" name="rep_contact" value="{{ old('rep_contact') }}" required autocomplete="rep_contact" placeholder="Contact">

                                        @error('rep_contact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="reg_button">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

