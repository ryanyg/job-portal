@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card-body"  >
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
        <div class="col-md-9">
            <br>
            <div class="card">
                 <div class="card-header" style="background-color: #f75e22; color: white;">Profile</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h4>Personal Information</h4>
                        </div>
                        <div class="col-md-3 text-right">
                            <p>Member Since: <span style="color: red;">{{Auth::user()->created_at ->format('M d, Y')}}</span></p>
                        </div>
                        <div class="col-md-12">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        @if(empty(Auth::user()->profile->avatar))
                                            <img src="{{asset('avatar/ry.jpg')}}" class="img-thumbnail">
                                        @else
                                            <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" class="img-thumbnail" width="160">
                                        @endif
                                        <button type="button" class="btn btn-primary form-control mt-2" data-toggle="modal" data-target="#exampleModal1">
                                          Edit Photo
                                        </button>
                                    </center>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <h5>Resume</h5>
                                    @if(!empty(Auth::user() -> profile -> resume))
                                        <a href="{{Storage::url(Auth::user()->profile->resume)}}"> 
                                            <input type="text" value="RESUME" class="form-control text-center" disabled="">
                                        </a>
                                    @else
                                    <p>Upload resume!</p>
                                    @endif
                                   
                                    <button type="button" class="btn btn-primary form-control mt-2" data-toggle="modal" data-target="#exampleModal5">
                                          Edit Resume
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10" >
                            <div class="row">
                                <div class="col-md-4">
                                    <p>First name: <input type="text" value=" {{Auth::user() -> f_name}}" class="form-control" disabled=""  style="text-transform: capitalize;"></p>
                                </div>
                                <div class="col-md-4">
                                    <p>Middle name: <input type="text" value=" {{Auth::user() -> m_name}}" class="form-control"  disabled=""  style="text-transform: capitalize;"></p>
                                </div>
                                <div class="col-md-4">
                                    <p>Last name: <input type="text" value=" {{Auth::user() -> l_name}}" class="form-control"  disabled=""  style="text-transform: capitalize;"></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Email Address: <input type="text" value=" {{Auth::user() -> email}}" class="form-control" disabled=""  style="text-transform: capitalize;"></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Mobile Number: <input type="text" value=" {{Auth::user() -> profile -> phone_number}}" class="form-control" disabled=""></p>
                                </div>
                                <div class="col-md-12">
                                    <p>Address: <input type="text" value=" {{Auth::user() -> profile -> address}}" class="form-control" disabled=""  style="text-transform: capitalize;"></p>
                                </div>
                                <div class="col-md-12">
                                    <p>Skill<textarea disabled="" class="form-control"  style="text-transform: capitalize;">{{Auth::user() -> profile -> skill}}</textarea></p>
                                </div>
                                <div class="col-md">
                                    <button type="button" class="btn btn-primary form-control mt-2" data-toggle="modal" data-target="#exampleModal2">
                                        Edit Personal Info
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"><br>
                    <div class="card">
                         <div class="card-header" style="background-color: #f75e22; color: white;">Educational Background
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                <p>Educational Attainment <input type="text" value= "{{Auth::user() -> profile -> edu_attainment}}" class="form-control" disabled=""></p>
                            </div>
                            <div class="col-md-12">
                                <p>School <input type="text" value="{{Auth::user() -> profile -> school}}" class="form-control" disabled=""  style="text-transform: capitalize;"></p>
                            </div>
                            <div class="col-md-6">
                                <p>Field of Study <input type="text" value="{{Auth::user() -> profile -> field_of_study}}" class="form-control" disabled=""  style="text-transform: capitalize;"></p>
                            </div>
                            <div class="col-md-6">
                                <p>Date Graudated <input type="text" value="{{Auth::user() -> profile -> date_graduated}}" class="form-control" disabled="" ></p>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary form-control mt-2" data-toggle="modal" data-target="#exampleModal4">
                                    Edit Eduacational Background
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <br>
                    <div class="row">
                        <div class="card">
                             <div class="card-header" style="background-color: #f75e22; color: white;">Work Experience</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                <p>Work Position <input type="text" value="{{Auth::user() -> profile -> work_position}}" class="form-control" disabled=""></p>
                            </div>
                            <div class="col-md-12">
                                <p>Company name <input type="text" value="{{Auth::user() -> profile -> work_company}}" class="form-control" disabled=""></p>
                            </div>
                            <div class="col-md-12">
                                <p>Work year experience<input type="text" value="{{Auth::user() -> profile -> work_year_experience}}" class="form-control" disabled=""></p>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary form-control mt-2" data-toggle="modal" data-target="#exampleModal3">
                                    Edit Work Experience
                                </button>
                            </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for photo-->
<form action="{{route('avatar')}}" method="POST" enctype="multipart/form-data">@csrf
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="file" class="form-control" name="avatar">
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


<!-- Modal personal data -->
<form action="{{route('profile.create')}}" method="POST">@csrf
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Personal Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="f_name" class="form-control"
                    required autocomplete="" placeholder="First Name"  value="{{Auth::user()-> f_name}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" name="m_name" class="form-control"
                    placeholder="Middle Name" value="{{Auth::user()-> m_name}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="l_name" class="form-control" 
                    required autocomplete="" placeholder="Last Name" value="{{Auth::user()-> l_name}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Email Address</label>
                <input type="text" name="email" class="form-control" 
                    required autocomplete="" placeholder="sample@email.com" value="{{Auth::user()-> email}}">
            </div>
            <div class="col-md-6 form-group">
                <label>Mobile Number</label>
                <input type="text" name="phone_number" class="form-control" placeholder="09xxxxxxxxx" value="{{Auth::user()-> profile -> phone_number}}">
                @if($errors -> has('phone_number'))
                    <div class="error" style="color:red; font-size: 10pt;">
                        {{$errors->first('phone_number')}}
                    </div>
                @endif
            </div>
            <div class="col-md-12 form-group">
                <label>Birthday</label>
                <input type="date" name="dob" class="form-control" required autocomplete="" value="{{Auth::user()-> profile -> dob}}">
            </div>
            <div class="col-md-12 form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required autocomplete="" placeholder="Address" value="{{Auth::user()-> profile -> address}}">
            </div>
            <div class="col-md-12 form-group">
                <label>Skill</label>
                <textarea class="form-control" name="skill" required autocomplete="" placeholder="Eg. Computer literate
      MS office proficient
      MS excel">{{Auth::user()-> profile -> skill}}</textarea>
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


<!-- Modal for educational background-->
<form action="{{route('profile.updateEducation')}}" method="POST">@csrf
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Educational Background</h5>
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
                    <input type="text" name="school"  class="form-control @error('school') is-invalid @enderror" id="school" required autocomplete="school" placeholder="School"  value="{{Auth::user()->profile->school }}" >
                </div>

                <div class="form-group">
                    <label for="field_of_study">Field of Study <i style="font-size: 10pt; color: red;">(*if high school diploma leave blank)</i></label>
                    <input id="field_of_study " type="text" class="form-control @error('field_of_study') is-invalid @enderror" name="field_of_study" required autocomplete="field_of_study" placeholder="Field of study" value="{{Auth::user()-> profile -> field_of_study }}">
                </div>

                <div class= "form-group">
                    <label for="date_graduated">Date Graduated <i style="font-size: 10pt; color: red">Put the expected year if you havent graduated yet OR put the year you were last entrolled if an undergrad</i></label>
                    <input type="date" name="date_graduated" class="form-control" required autocomplete="date_graduated"  value="{{Auth::user()-> profile -> date_graduated}}">
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
<form action="{{route('profile.updateWork')}}" method="POST"> @csrf
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Work Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="work_position">Position </label>
                <input type="text" name="work_position" class="form-control" placeholder="Position"  value="{{Auth::user()-> profile -> position}}">
            </div>
            <div class="form-group">
                <label for="work_company">Company <i>add None if no work experience in the blank</i></label>
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




<!-- Modal for resume-->
<form action="{{route('resume')}}" method="POST" enctype="multipart/form-data">@csrf
<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Resume</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="file" class="form-control" name="resume">
            @if($errors -> has('resume'))
                <div class="error" style="color:red; font-size: 10pt;">
                    {{$errors->first('resume')}}
                </div>
            @endif
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




@endsection
