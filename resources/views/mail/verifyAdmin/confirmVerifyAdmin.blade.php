<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
<div>
    <p>Bạn nhận được lời mời làm {{config('constants.role_admin')[$data['role_admin']]}} trên website Cộng đoàn Giáo phận Vinh Hà Tĩnh tại Hà Nội</p>
    <p>Chức vụ: {{config('constants.role_admin')[$data['role_admin']]}} </p>
    <br>
    <p> Nhấp vào link sau để đổi mật khẩu URL: {{ $data['url'] }}</p>
    <p> Nhấp vào link sau để truy cập trang quản trị website cộng đoàn {{ $data['url_login'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Mọi chi tiết xin liên hệ: {{config('mail.from.address')}}</p>
</div>
</body>
</html>
