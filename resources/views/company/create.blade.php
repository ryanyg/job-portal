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
                <div class="card-header" style="background-color: #f75e22; color: white;">Company Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h4>Company Information</h4>
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
                            <div class="row text-center">
                                <div class="col-md-12 mt-2">
                                    @if(empty(Auth::user()->company->logo))
                                        <img src="{{asset('avatar/ry.jpg')}}" class="img-thumbnail">
                                    @else
                                        <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" class="img-thumbnail">
                                    @endif
                                    <p class="text-center mt-2 text-justify">Company logo</p>
                                    <button type="button" class="btn btn-cdc form-control" data-toggle="modal" data-target="#exampleModal1">
                                          Edit logo
                                        </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <!--company profile-->
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Company name: <input type="text" value=" {{Auth::user() ->company-> company_name}}" class="form-control" disabled=""></p>
                                </div>
                                <div class="col-md-12">
                                    <p>Email Address: <input type="text" value=" {{Auth::user() -> email}}" class="form-control" disabled="" style=" text-transform: lowercase;"></p>
                                </div>
                                <div class="col-md-6">
                                    <p>CRTE: <input type="text" value=" {{Auth::user()->company -> crte}}" class="form-control" disabled=""></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Validity: <input type="text" value=" {{Auth::user() -> company->validity}}" class="form-control" disabled=""></p>
                                </div>
                                <div class="col-md-12">
                                    <p>Address: <input type="text" value=" {{Auth::user() -> company -> address}}" class="form-control" disabled=""></p>
                                </div>
                                <div class="col-md-12">
                                    <p>Industry: <input type="text" value=" {{Auth::user() -> company -> industry}}" class="form-control" disabled=""></p>
                                </div>
                                <div class="col-md-12">
                                    <p>Website: <input type="text" value=" {{Auth::user() -> company -> website}}" class="form-control" disabled=""></p>
                                </div>
                                <div class="col-md">
                                    <button type="button" class="btn btn-cdc form-control" data-toggle="modal" data-target=".bd-example-modal-lg1">Edit Company Info</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!--company representative-->
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Company Representative</h4>
                        </div>
                        <div class="col-md-12">
                            <p>Full name:  <input type="text" value= "{{Auth::user() -> company -> rep_fullname}}" class="form-control" disabled=""></p>
                        </div>
                        <div class="col-md-4">
                            <p>Position:  <input type="text" value= "{{Auth::user() -> company -> rep_position}}" class="form-control" disabled=""></p>
                        </div>
                        <div class="col-md-4">
                            <p>Email address: <input type="text" value="{{Auth::user() -> company -> rep_email}}" class="form-control" disabled=""></p>
                        </div>
                        <div class="col-md-4">
                            <p>Contact number: <input type="text" value="{{Auth::user() ->company -> rep_contact}}" class="form-control" disabled=""></p>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-cdc form-control" data-toggle="modal" data-target=".bd-example-modal-lg2"> Edit Company Representative</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-1">
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>   
    </div>
</div>


<!-- Modal for photo-->
<form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">@csrf
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Company logo</h5>
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

<!-- Modal Company info -->
<form action="{{route('company.store')}}" method="POST">@csrf
    <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Company Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Company name:</label>
                            <input type="text" name="company_name" class="form-control"
                            required autocomplete="" placeholder="Company name" value="{{Auth::user() -> company -> company_name}}">
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Email Address</label>
                        <input type="text" name="email" class="form-control" 
                            required autocomplete="email" placeholder="sample@email.com"  value="{{Auth::user() -> email}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>CRTE:</label>
                        <input type="text" name="crte" class="form-control" placeholder="CRTE"  value="{{Auth::user() -> company -> crte}}">
                        @if($errors -> has('crte'))
                            <div class="error" style="color:red; font-size: 10pt;">
                                {{$errors->first('crte')}}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Validity:</label>
                        <input type="date" name="validity" class="form-control" placeholder="Validity"  value="{{Auth::user() -> company -> validity}}">
                        @if($errors -> has('validity'))
                            <div class="error" style="color:red; font-size: 10pt;">
                                {{$errors->first('validity')}}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required autocomplete="" placeholder="Address"  value="{{Auth::user() -> company -> address}}">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Industry</label>
                        <select name="industry" class="
                            form-control">
                            @foreach(App\Industry::all() as $int)
                                <option value="{{$int->name}}">{{$int -> name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Website</label>
                        <input type="text" name="website" class="form-control" required autocomplete="" placeholder="Website"  value="{{Auth::user() -> company -> website}}">
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


<!-- Modal for Company Representative-->
<form action="{{route('companyRep.store')}}" method="POST">@csrf
    <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Company Representative</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="rep_fullname">Full name:</label>
                    <input type="text" name="rep_fullname"  class="form-control @error('rep_fullname') is-invalid @enderror" required autocomplete="rep_fullname" placeholder="Fullname"  value="{{Auth::user() -> company -> rep_fullname}}">
                </div>
                <div class="form-group">
                    <label for="rep_position">Position:</label>
                    <input type="text" name="rep_position"  class="form-control @error('rep_position') is-invalid @enderror" id="rep_position"  required autocomplete="rep_position" placeholder="Position"
                     value="{{Auth::user() -> company -> rep_position}}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                          <div class="form-group">
                              <label for="rep_email">Email address:</label>
                              <input type="text" name="rep_email"  class="form-control @error('rep_email') is-invalid @enderror" id="rep_email"required autocomplete="rep_email" placeholder="Email .."  value="{{Auth::user() -> company -> rep_email}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rep_contact">Contact Number:</label>
                            <input type="text" name="rep_contact"  class="form-control @error('rep_contact') is-invalid @enderror" id="rep_contact" required autocomplete="rep_contact" placeholder="Contact number"  value="{{Auth::user() -> company -> rep_contact}}">            
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
@endsection

