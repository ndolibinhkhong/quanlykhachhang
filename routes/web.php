<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\KhachHang;
use App\Models\User;

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
        return redirect()->route("khachhang.get");
    }
    else{
        return back()->with(['p_login_message'=>"[Thông tin không chính xác!]"]);
    }
})->name('login.post');

Route::get('/dashboard/khachhang', function () {
    $khachs = KhachHang::all();
    return view('khachhang', compact("khachs"));
})->name('khachhang.get')->middleware('auth');


Route::post('/dashboard/khachhang', function (Request $request) {
    $id = $request->ip_id;
    $name = $request->ip_name;
    $phone = $request->ip_phone;
    $address = $request->ip_address;
    if($id == 0){
        $khach_hang = new KhachHang;
        $khach_hang->name = $name;
        $khach_hang->phone = $phone;
        $khach_hang->address = $address;
        $khach_hang->save();
        return back()->with(['p_message'=>"[Thêm thành công!]"]);
    }
    else{
        $khach_hang = KhachHang::find($id);
        $khach_hang->name = $name;
        $khach_hang->phone = $phone;
        $khach_hang->address = $address;
        $khach_hang->update();
        return back()->with(['p_message'=>"[Cập nhật thành công!]"]);
    }
})->name('khachhang.post')->middleware('auth');


Route::get('/dashboard/taikhoan', function () {
    $taikhoans = User::all();
    return view('taikhoan', compact("taikhoans"));
})->name('taikhoan.get')->middleware('auth');

Route::post('/dashboard/taikhoan', function (Request $request) {
    $name = $request->ip_name;
    $email = $request->ip_email;
    $password = $request->ip_password;
    $user = new User;
    $user->name = $name;
    $user->email = $email;
    $user->password = bcrypt($password);
    $user->save();

    return back()->with(['p_message'=>"[Thêm thành công!]"]);
})->name('taikhoan.post')->middleware('auth');
