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
                        <li class="list-group-item">
                            <a href="company/{{Auth::user() -> company -> id}}/{{Auth::user() -> company -> company_name}}">My Company Page</a>
                        </li>
                    </ul>
            </div>
        </div>
        <div class="col-md-9"><br>
            <div class="card">
                <div class="card-header" style="background-color: #f75e22; color: white;">Job Vacancy Information</div>
                <div class="card-body">
                    <form action="{{route('jobs.store')}}" method="POST">@csrf
                    <div class="row">
                        <div class="col-md-12">
                             @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category">Job Category:</label>
                                <select name="category" class="
                                    form-control">
                                    @foreach(App\Category::all() as $cat)
                                        <option value="{{$cat->name}}">{{$cat -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position">Job Position:</label>
                                <input type="text" name="position" required="" autocomplete="" class="
                                form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position_level">Position Level:</label>
                                <select name="position_level" class="
                                    form-control">
                                    @foreach(App\Position_level::all() as $pos_lvl)
                                        <option value="{{$pos_lvl->name}}">{{$pos_lvl -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number_vacancy">Number of Vacancy:</label>
                                <input type="text" name="number_vacancy" required="" autocomplete="" class="
                                form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="work_schedule">Type:</label>
                                <select name="work_schedule" class="
                                    form-control">
                                    @foreach(App\Work_Schedule::all() as $work_sched)
                                        <option value="{{$work_sched->name}}">{{$work_sched -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Job description:</label>
                                <textarea class="form-control"  required="" autocomplete="" name="description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="education">Education:</label>
                                <select name="education" class="
                                    form-control">
                                    @foreach(App\Education::all() as $edu)
                                        <option value="{{$edu->name}}">{{$edu -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender_">Gender:</label>
                                <select name="gender" class="
                                    form-control">
                                    @foreach(App\Gender::all() as $gen)
                                        <option value="{{$gen->name}}">{{$gen -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="work_experience">Years of experience:</label>
                                <select name="work_experience" class="
                                    form-control">
                                    @foreach(App\Work_experience::all() as $workexp)
                                        <option value="{{$workexp->name}}">{{$workexp -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="skill">Qualification Skills:</label>
                                <textarea class="form-control" required autocomplete="" name="skill"
                                ></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" class="
                                    form-control">
                                    <option value="1">Live</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="salary">Salary: <span style="font-size:10pt;color: red;">(Optional)</span></label>
                                <input type="text" name="salary" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-cdc form-control">Save</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>     
     </div>
</div>

@endsection

