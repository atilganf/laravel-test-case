@extends('layout')

@section('content')
<h4 class="text-secondary">Login</h4>
<hr>

<form method="POST" action="{{ route('loginUser') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">First Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Last Name</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="mb-3">
        @error('first_name')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<br>
<br>
<h5 class="border-bottom w-25 pb-2">Login Samples</h5>

<b>Employee: </b> Georgi Facello
<br>
<b>Manager : </b> Yuchang Weedman
@endsection