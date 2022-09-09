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
    return view('welcome');
});

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
        return "đúng";
    }
    else{
        return back()->with(['p_login_message'=>"[Thông tin không chính xác!]"]);
    }
})->name('login.post');

