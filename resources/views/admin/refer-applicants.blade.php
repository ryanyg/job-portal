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
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger">
                                {{Session::get('failed')}}
                            </div>
                        @endif

                        @if($applicants->count() > 0)

                            <div class="card">

                                <div class="card-header" style="background-color: #f75e22; color: white;">
                                    Refer an applicant
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach($applicants as $applicant)
                                            <table class="table" style="border: 1px solid red;">
                                                <thead>
                                                <tr>
                                                    <th>Applicant Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            {{ \App\User::findOrFail($applicant->user_id)->f_name }} {{ \App\User::findOrFail($applicant->user_id)->l_name }}
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg{{$applicant->id}}">
                                                                Refer
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                                <!-- Modal report applicant -->
                                                <form id="form{{$applicant->id}}" action="{{ route('admin.referApplicant') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="user" value="{{$applicant->user_id}}"/>
                                                        <div class="modal fade bd-example-modal-lg{{$applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Select a company and job</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class ="row">

                                                                            <div class="col-md-12 form-group">
                                                                                <label>Company</label>
                                                                                <select id="company{{$applicant->id}}" onchange="getJob({{$applicant->id}})" name="company" class="form-control" required>
                                                                                    <option selected>Select a company</option>
                                                                                    @foreach($companies as $company)
                                                                                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <div class="col-md-12 form-group" id="myDiv{{$applicant->id}}">
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
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <br>

                            {{ $applicants->links() }}

                        @else

                            <div class="alert alert-danger">
                                No applicant found!
                            </div>

                        @endif
                    </div>
                </div><br>
            </div>
        </div>
    </div>
@endsection

<script>
    function getJob(num) {

        var company = document.getElementById("company"+num).value;
        var data = '{{ json_encode($jobs) }}'.replace(/&quot;/g,'"');
        var jobs = JSON.parse(data.replace(/&quot;/g,'"')).filter(x => x.company_id == company);

        var select = document.getElementById("mySelect"+num);

        if(select != null) {
            select.remove();
        }

        console.log(jobs);
        var myDiv = document.getElementById("myDiv"+num);
        var selectList = document.createElement("select");
        selectList.id = "mySelect"+num;
        selectList.classList.add("form-control");
        selectList.name = "job";
        myDiv.appendChild(selectList);

        jobs.forEach(job => {
            var option = document.createElement("option");
            option.value = job.id;
            option.text = job.position;
            selectList.appendChild(option);
        });

    }

</script>

<style>
    .btn-qualify{
        background-color: #FD8971;
        color: white;
    }
</style>