<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lý</title>
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/w3.css') !!}">
    
</head>
<body>
<div class="w3-bar w3-black">
  <a href="{{route('khachhang.get')}}" class="w3-bar-item w3-button">Khách hàng</a>
  <a href="{{route('taikhoan.get')}}" class="w3-bar-item w3-button">Tài khoản</a>
</div>
<div class="w3-container">
    <h2>Danh sách Tài khoản  <button onclick="openModal();" class="w3-button w3-green w3-large">Thêm mới</button></h2>
    <p style="text-align: center; color: blue;">{{Session::get('p_message')}}</p>
    <table class="w3-table-all">
        <thead>
        <tr class="w3-green">
            <th>Họ tên</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
            @if(count($taikhoans) == 0)
            <tr>
                <td colspan="3" style="color: red; text-align: center;">Chưa có dữ liệu</td>
            </tr>
            @else
                @foreach($taikhoans as $taikhoan)
                <tr>
                    <td>{{$taikhoan->name}}</td>
                    <td>{{$taikhoan->email}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        </div>
        <form class="w3-container" method="post" action="{{route('taikhoan.post')}}">
            <div class="w3-section">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label><b>Họ tên</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" id="ip_name" name="ip_name" required maxlength="255">
                <label><b>Email</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" id="ip_email" name="ip_email" required maxlength="60">
                <label><b>Mật khẩu</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="password" id="ip_password" name="ip_password" required maxlength="32">
                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Thêm mới</button>
            </div>
        </form>
    </div>
</div>

  <script>
    function openModal(){
        document.getElementById('id01').style.display='block';
        document.getElementById('ip_name').value = "";
        document.getElementById('ip_phone').value = "";
        document.getElementById('ip_address').value = "";

    }
  </script>

</body>
</html>