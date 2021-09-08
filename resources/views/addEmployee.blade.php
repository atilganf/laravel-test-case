{{-- First Name  : Text
Last Name   : Text
Birth Date  : Date Select
Hire Date   : Date Select
Job Title   : Text / Select
Gender      : Select --}}
<form method="POST" action="{{ route('addEmployee') }}">
    @csrf
    <input type="hidden" name="dept_no" value="{{ $user->department->dept_no }}">
    <div class="row">
        <div class="mb-3 col-6">
            <label class="form-text" for="first_name">First Name</label>
            <input placeholder="Maximum 14 Character" class="form-control" type="text" name="first_name"
                id="first_name">
            @error('first_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 col-6">
            <label class="form-text" for="last_name">Last Name</label>
            <input placeholder="Maximum 16 Character" class="form-control" type="text" name="last_name" id="last_name">
            @error('last_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label class="form-text" for="birth_date">Birth Date</label>
            <input class="form-control" value="{{ $date }}" type="date" min='1899-01-01'
                max="{{ $date }}" name="birth_date" id="birth_date">
            @error('birth_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 col-6">
            <label class="form-text" for="hire_date">Hire Date</label>
            <input class="form-control" value="{{ $date }}" type="date" min='1899-01-01'
                max={{ $date }} name="hire_date" id="hire_date">
            @error('hire_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label class="form-text" for="job_title">Job Title</label>
            <select class="form-select" name="job_title" id="job_title">
                <option value="Senior Engineer">Senior Engineer</option>
                <option value="Staff">Staff</option>
                <option value="Engineer">Engineer</option>
                <option value="Senior Staff">Senior Staff</option>
                <option value="Assistant Engineer">Assistant Engineer</option>
                <option value="Technique Leader">Technique Leader</option>
                <option value="Manager">Manager</option>
            </select>
            @error('job_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 col-6">
            <label class="form-text" for="gender">Gender</label>
            <select class="form-select" name="gender" id="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-primary w-25" type="submit">Submit</button>
        </div>
    </div>
</form>
