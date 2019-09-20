@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('company.profile')}}">Company Profile</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('jobs.create')}}">Add Job</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('jobs.myjob')}}">My Job</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('jobs.applicant') }}">Applicants</a>
                        </li>
                        <li class="list-group-item">
                            <a href="company/{{Auth::user() -> company -> id}}/{{Auth::user() -> company -> company_name}}">My Page</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>   
        <div class="col-md-10">
            <div class="row p-1">
                <div class="col-md-12">
                    <form action="{{route('jobs.update',[$jobs->id])}}" method="POST">@csrf
                    <div class="row p-1" style="background-color: white; border:  1px solid black; border-radius: 10px;">
                        <div class="col-md-12">
                             @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="card-header">
                                <h4>Edit Job Vacancy Information</h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category">Category:</label>
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
                                <label for="position">Position:</label>
                                <input type="text" name="position" required="" autocomplete="" class="
                                form-control" value="{{$jobs -> position}}">
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
                                form-control" value="{{$jobs -> number_vacancy}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="work_schedule">Work Schedule:</label>
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
                                <textarea class="form-control"  required="" autocomplete="" name="description">{{$jobs -> description}}
                                </textarea>
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
                                <label for="gender">Gender:</label>
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
                                <label for="work_experience_id">Work year experience:</label>
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
                                <label for="skill">Skill:</label>
                                <textarea class="form-control" required autocomplete="" name="skill"
                                >{{$jobs -> skill}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select name="type" class="
                                    form-control">
                                    @foreach(App\Status::all() as $sta)
                                        <option value="{{$sta->name}}">{{$sta -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" class="
                                    form-control">
                                    <option value="1">Live</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="salary">Salary: <span style="font-size:10pt;color: red;">(Optional)</span></label>
                                <input type="text" name="salary" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary form-control">Save changes</button>
                            </div>
                        </div>

                    </form>

                    </div>
                </div>
            </div>
        </div>     
     </div>
</div>

@endsection
