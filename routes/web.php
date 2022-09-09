<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    return view('login');
})->name("login");

Route::get('/login', function () {
    return view('login');
})->name('login.get');

Route::post('/login', function (Request $request) {
    $email = $request->ip_email;
    $password = $request->ip_password;

    $user = array(
        'email' => $email,
        'password' => $password
    );

    if (Auth::guard()->attempt($user)){
        return redirect()->route("dashboard.get");
    }
    else{
        return back()->with(['p_login_message'=>"[Thông tin không chính xác!]"]);
    }
})->name('login.post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard.get')->middleware('auth');


Route::post('/dashboard', function () {
    return 1;
})->name('dashboard.post')->middleware('auth');

