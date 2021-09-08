@extends('layout')
@section('content')
    <h4 class="text-secondary underline">Manager Profile</h4>
    <hr>
    <div class="row">

        <div class="col-12 col-md-4">
            <h5>Personal Information</h5>
            <hr>
            <b>First Name:</b> {{ $user->first_name }}
            <br>
            <b>Last Name: </b> {{ $user->last_name }}
            <br>
            <b>Birth Date: </b> {{ $user->birth_date }}
            <br>
            <b>Cinsiyet: </b> {{ $user->gender }}
            <br>
            <b>Hire Date: </b> {{ $user->hire_date }}
        </div>
        <div class="col-12 col-md-8">
            <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">Employees</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Add Employee</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table style="font-size: 13px" class="table table-hover table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Emp No</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Birth Date</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Hire Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <th scope="row">{{ $employee['emp_no'] }}</th>
                                    <td>{{ $employee['first_name'] }}</td>
                                    <td>{{ $employee['last_name'] }}</td>
                                    <td>{{ $employee['birth_date'] }}</td>
                                    <td>{{ $employee['gender'] }}</td>
                                    <td>{{ $employee['hire_date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $employees->links() }}
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @include('addEmployee')
                </div>
            </div>


        </div>
    </div>
@endsection
