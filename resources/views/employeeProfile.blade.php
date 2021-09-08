@extends('layout')
@section('content')
    <h4 class="text-secondary underline">Employee Profile</h4>
    <hr>
    <div class="row">

        <div class="col-12 col-md-4">
            <h5>Personal Information</h5>
            <hr>
            <br>
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
            <h5>Salaries</h5>
            <hr>
            <table class="table table-hover table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->salaries as $salary)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$salary->salary}} TL</td>
                            <td>{{$salary->from_date}}</td>
                            <td>{{$salary->to_date}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
