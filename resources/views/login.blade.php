<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/w3.css') !!}">
    
</head>
<body>
<div>
    

<div style="width:350px; margin: auto;margin-top: 100px">
    <div class="w3-container w3-blue">
        <h2>Đăng nhập</h2>
    </div>
    <p style="text-align: center; color: red;">{!! Session::get('p_login_message') !!}</p>
    <form method="post" class="w3-container" action="{!!route('login.post')!!}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p>
            <label>Email</label>
            <input class="w3-input" type="text" name="ip_email" maxlength="60">
        </p>
        <p>
            <label>Mật khẩu</label>
            <input class="w3-input" type="password" name="ip_password" maxlength="32">
        </p>
        <button style="width:100%" class="w3-btn w3-blue" type="submit">Đăng nhập</button>
    </form>
</div>
 
</div>
</body>
</html>