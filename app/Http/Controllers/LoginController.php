<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginUser(Request $request)
    {
        $credentials = ["first_name" => $request["name"], "last_name" => $request["password"]];

        $user = Employee::where($credentials)->first();
        if ($user) {
            $request->session()->put("auth", true);
            $request->session()->put("emp_no", $user->emp_no);

            return redirect("profile");
        }
        return back()->withErrors([
            'first_name' => 'Kullanıcı adı veya parola hatalı',
        ]);

        // $validate = $request->validate([
        //     "name" => ["required"],
        //     "password" => ["required"]
        // ]);

        // // doesnt authenticate after index 59 for some reason
        // $emps = Employee::all();
        // $i = 0;
        // foreach ($emps as $emp) {
        //     // dd($emp->first_name, $emp->last_name);
        //     $cred = ["first_name" => $emp->first_name, "password" => $emp->last_name];
        //     if (Auth::once($cred)) {
        //         Auth::logout();
        //     } else {
        //         dd($emp->emp_no, $i);
        //     }
        //     $i++;
        // }

        // $credentials = ["first_name" => $validate["name"], "password" => $validate["password"]];

        // if (Auth::once($credentials)) {
        //     dd("gege");
        //     $request->session()->put("auth", true);
        //     $request->session()->put("emp_no", Auth::user()->emp_no);

        //     return redirect("profile");
        // }


    }
    public function logout(Request $request)
    {
        $request->session()->put("auth", false);
        $request->session()->put("emp_no", 0);
        // dd(session()->all());
        return redirect("/");
    }
}
