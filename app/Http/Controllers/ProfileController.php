<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Department;
use App\Models\DepartmentEmployee;
use App\Models\DepartmentManager;
use App\Models\Employee;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (session("auth")) {
            $emp_no = session("emp_no");
            $user = Employee::where("emp_no", $emp_no)->first();
            if ($user->dept_manager) {
                return redirect("managerProfile");
            } else {
                return redirect("employeeProfile");
            }
        }
        return redirect("/");
    }

    public function employeeProfile()
    {
        if (session("auth")) {
            $emp_no = session("emp_no");
            $user = Employee::where("emp_no", $emp_no)->first();

            return view("employeeProfile", compact("user"));
        }
        return redirect("/");
    }

    public function managerProfile()
    {
        if (session("auth")) {
            $emp_no = session("emp_no");
            $user = Employee::where("emp_no", $emp_no)->first();

            $date = date("Y-m-d");

            $department_employees = $user->department_employees;
            $employees = Employee::whereIn("emp_no", $department_employees->pluck("emp_no"));
            $employees = $employees->paginate(15);

            return view("managerProfile", compact("user", "employees", "date"));
        }
        return redirect("/");
    }

    public function addEmployee(Request $request)
    {
        $request->validate([
            "emp_no" => ["required"],
            "first_name" => ["required", "max:14", "min:2"],
            "last_name" => ["required", "max:16", "min:2"],
            "birth_date" => ["required"],
            "hire_date" => ["required"],
            "job_title" => ["required", "max: 50"],
        ]);



        $employee = new Employee();
        $employee->first_name = $request->input("first_name");
        $employee->last_name = $request->input("last_name");
        $employee->gender = $request->input("gender");
        $employee->birth_date = $request->input("birth_date");
        $employee->hire_date = $request->input("hire_date");
        $employee->save();

        


        $title = new Title();
        $title->emp_no = $employee->id;
        $title->$title = $request->input("job_title");
        $title->from_date = $request->input("hire_date");
        $title->to_date = date("Y-m-d");


        if ($title->job_title == "Manager") {
            $dept_manager = new DepartmentManager();
            $dept_manager->emp_no = $employee->id;
            $dept_manager->dept_no = $request->input("dept_no");
            $dept_manager->from_date = $request->input("hire_date");
            $dept_manager->to_date = date("Y-m-d");
            $dept_manager->save();
        } else {
            $dept_emp = new DepartmentEmployee();
            $dept_emp->emp_no = $employee->id;
            $dept_emp->dept_no = $request->input("dept_no");
            $dept_emp->from_date = $request->input("hire_date");
            $dept_emp->to_date = date("Y-m-d");
            $dept_emp->save();
        }


        
        $title->save();

        return redirect()->back()->withErrors($request);
    }
}
