<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (session("auth")) {
        return redirect()->route("profile");
    } else {
        return view("login");
    }
});

Route::post("/loginUser", [LoginController::class, "loginUser"])->name("loginUser");
Route::post("/logout", [LoginController::class, "logout"])->name("logout");

Route::get("/profile", [ProfileController::class, "index"])->name("profile");
Route::get("/employeeProfile", [ProfileController::class, "employeeProfile"])->name("employeeProfile");
Route::get("/managerProfile", [ProfileController::class, "managerProfile"])->name("managerProfile");
Route::post("/addEmployee", [ProfileController::class, "addEmployee"])->name("addEmployee");
