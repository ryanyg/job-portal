@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="row">
    @if(Auth::user() -> user_type == 'company')
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
                            <a href="">Employement Report</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">List of Hired Applicants</a>
                        </li>
                        <li class="list-group-item">
                            <a href="company/{{Auth::user() -> company -> id}}/{{Auth::user() -> company -> company_name}}">My Company Page</a>
                        </li>
                    </ul>
            </div>
        </div>
        <div class="col-md-9"><br>
            <div class="card">
                <div class="card-header" style="background-color: #f75e22; color: white;"></div>
               
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
                    <h5>**</h5>
                    
                    <p>Total Job Post: {{$jobs -> count()}}</p>
                    <ul>
                        @if(empty(Auth::user()->company->logo))
                            <li>
                                <p><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg4">Add Company Logo</button></p>
                            </li>
                        @endif   
                        @if(empty(Auth::user()->company->rep_fullname))
                            <li>
                                <p><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg3">Add company Representative</button></p>
                            </li>
                        @endif
                    </ul>

                </div>
            </div>
        </div>
        @elseif(Auth::user() -> user_type == "seeker")
        <div class="col-md-3">
            <div class="card-body">
                @if(!empty(Auth::user()->profile->edu_attainment))
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{route('home')}}" >Home</a>
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
                @else
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="">Home</a>
                    </li>
                    <li class="list-group-item">
                        <a href="">My Profile</a>
                    </li>
                    <li class="list-group-item">
                        <a href="">List of Jobs</a>
                    </li>
                    <li class="list-group-item">
                        <a href="">List of companies</a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
        <div class="col-md-9">
            <br>
            <div class="card">
                <div class="card-header"  style="background: linear-gradient(to bottom, #104dac 20%, #f75e22 150%); color: white;">Welcome to Clark Job Portal!</div>
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
                    <div class="row">
                        <div class="col-md-12">

                            @if(empty(Auth::user()->profile->edu_attainment))   
                            <p>Alert! Todo please add these to your account so you can apply job ..</p>
                            @endif

                            <ul>
                                @if(empty(Auth::user()->profile->avatar))
                                    <li>
                                        <p><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg5">Add Photo</button></p>
                                    </li>
                                @endif   
                                @if(empty(Auth::user()->profile->phone_number))
                                    <li>
                                        <p><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg1">Add Personal Info</button></p>
                                    </li>
                                @endif
                                @if(empty(Auth::user()->profile->resume))
                                    <li>
                                        <p><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg6">Add Resume</button></p>
                                    </li>
                                @endif
                                @if(empty(Auth::user()->profile->edu_attainment))
                                    <li>
                                        <p><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg7">Add Educational Background</button></p>
                                    </li>
                                @endif
                                @if(empty(Auth::user()->profile->work_position))
                                    <li><p><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg8">Add Work Experience</button></p></li>
                                @endif
                                </ul>
                        </div>
                        <div class="col-md-12">
                            @if($jobs->count() > 0)
                            <div class="card">
                                <div class="card-header"  style="background: linear-gradient(to bottom, #104dac 0%, #f75e22 118%); color: white;">Job Application Status</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table" style="border-bottom: 1px solid red;">
                                                <thead>
                                                <tr>
                                                    <th>Company</th>
                                                    <th>Applying for Job Position</th>
                                                    <th>Application Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($jobs as $job)
                                                    <tr>
                                                        <td>
                                                            {{ \App\Company::findOrFail(\App\Job::findOrFail($job->job_id)->company_id)->company_name }}
                                                        </td>
                                                        <td>
                                                            {{ \App\Job::findOrFail($job->job_id)->position }}
                                                        </td>
                                                        <td>
                                                            @if($job->job_status == "hired")
                                                                <span class="badge badge-pill badge-success" style="font-size: 10pt">Hired</span>
                                                            @else
                                                                <span class="badge badge-pill badge-danger" style="font-size: 10pt">
                                                                Not Hired</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br/>
        </div>
        @endif
    </div>
</div>


<!-- Modal personal data -->
<form action="{{route('add.personalInfo')}}" method="POST">@csrf
<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Personal Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class ="row">
            <div class="col-md-6 form-group">
                <label>Mobile Number</label>
                <input type="text" name="phone_number" class="form-control" placeholder="09xxxxxxxxx">
                @if($errors -> has('phone_number'))
                    <div class="error" style="color:red; font-size: 10pt;">
                        {{$errors->first('phone_number')}}
                    </div>
                @endif
            </div>
            <div class="col-md-6 form-group">
                <label>Birthday</label>
                <input type="date" name="dob" class="form-control" required autocomplete="">
            </div>
            <div class="col-md-12 form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required autocomplete="" placeholder="Address">
            </div>
            <div class="col-md-12 form-group">
                <label>Skill</label>
                <textarea class="form-control" name="skill" required autocomplete="" placeholder="Eg. Computer literate
      MS office proficient
      MS excel"> </textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>






<!-- Modal Add Comp Rep -->
<form method="POST" action="{{ route('companyRep.store') }}"> @csrf
<div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Company Representative</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="f_name">{{ __('Company Representative Full name') }}</label>
                        <input id="rep_fullname" type="text" class="form-control @error('rep_fullname') is-invalid @enderror" name="rep_fullname" required autocomplete="rep_fullname" autofocus placeholder="Full name">
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
                        <input id="rep_position" type="text" class="form-control @error('rep_position') is-invalid @enderror" name="rep_position" required autocomplete="rep_position" autofocus placeholder="Position">
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
                        <input id="rep_email" type="email" class="form-control @error('email') is-invalid @enderror" name="rep_email"  required autocomplete="rep_email" placeholder="Representative Email address">
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
                        <input id="rep_contact" type="text" class="form-control @error('rep_contact') is-invalid @enderror" name="rep_contact" required autocomplete="rep_contact" placeholder="Representative Contact number">
                        @error('rep_contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal seeker photo -->
<form method="POST" action="{{ route('avatar') }}" enctype="multipart/form-data"> @csrf
<div class="modal fade bd-example-modal-lg5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add your Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="file" class="form-control" name="avatar" id="avatar">
            @if($errors -> has('avatar'))
                <div class="error" style="color:red; font-size: 10pt;">
                    {{$errors->first('avatar')}}
                </div>
            @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal resume -->
<form method="POST" action="{{ route('resume') }}" enctype="multipart/form-data"> @csrf
<div class="modal fade bd-example-modal-lg6" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Resume</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="file" class="form-control" name="resume" id="resume">
            @if($errors -> has('resume'))
                <div class="error" style="color:red; font-size: 10pt;">
                    {{$errors->first('resume')}}
                </div>
            @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Modal for educational background-->
<form method="POST" action="{{ route('profile.updateEducation') }}" enctype="multipart/form-data"> @csrf
<div class="modal fade bd-example-modal-lg7" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Educational Background</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="edu_attainment">{{ __('Educational Attainment') }}</label>
                    <select name="edu_attainment" class="form-control">
                        @foreach(App\Education::all() as $edu)
                            <option value="{{$edu->name}}">{{$edu -> name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="school">School</label>
                    <input type="text" name="school"  class="form-control @error('school') is-invalid @enderror" id="school" value="{{ old('school') }}" required autocomplete="school" placeholder="School">
                </div>

                <div class="form-group">
                    <label for="field_of_study">Field of Study <i style="font-size: 10pt; color: red;">(*if high school diploma leave blank)</i></label>
                    <input id="field_of_study " type="text" class="form-control @error('field_of_study') is-invalid @enderror" name="field_of_study" value="{{ old('field_of_study') }}" required autocomplete="field_of_study" placeholder="Field of study">
                </div>

                <div class= "form-group">
                    <label for="date_graduated">Date Graduated <i style="font-size: 10pt; color: red">Put the expected year if you havent graduated yet OR put the year you were last entrolled if an undergrad</i></label>
                    <input type="date" name="date_graduated" class="form-control" required autocomplete="date_graduated">
                </div>



                @error('Educational Attainment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Modal for work exp-->
<form method="POST" action="{{ route('profile.updateWork') }}" enctype="multipart/form-data"> @csrf
<div class="modal fade bd-example-modal-lg8" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Work Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="work_position">Position <i style="font-size: 10pt; color: red;">( *Put None if no work experience in the blank )</i></label>
                <input type="text" name="work_position" class="form-control" placeholder="Position">
            </div>
            <div class="form-group">
                <label for="work_company">Company <i style="font-size: 10pt; color: red;">( *Put None if no work experience in the blank )</i></label>
                <input type="text" name="work_company" class="form-control" placeholder="Company" >
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="work_year_experience">Work year Experience</label>
                    <select name="work_year_experience" class="form-control">
                        @foreach(App\Work_experience::all() as $workexp)
                            <option value="{{$workexp->name}}">{{$workexp -> name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- Modal Add Comp logo -->
<form method="POST" action="{{ route('company.logo') }}" enctype="multipart/form-data"> @csrf
<div class="modal fade bd-example-modal-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Company Logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="file" class="form-control" name="logo" id="logo">
            @if($errors -> has('logo'))
                <div class="error" style="color:red; font-size: 10pt;">
                    {{$errors->first('logo')}}
                </div>
            @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
