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
    <p>Bạn đã được thêm làm quản trị viên trên page cộng đoàn, vui lòng đăng nhập ở link phía dưới và thay đổi mật khẩu</p>
    <br>
    <p>Link đổi mật khẩu :<a href="{{ $data['url'] }}">{{ $data['url'] }}</a></p>

    <p>Link trang admin web cộng đoàn:  {{config('app.url')}}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Account Information</p>
    <p>Mọi thắc mắc liên hệ : 'tranvieth2t@gmai.com' </p>
</div>
</body>
</html>
