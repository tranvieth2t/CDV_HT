<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bạn nhận được yêu cầu phê duyệt bài viết</title>
</head>
<body>
<div>
    <p>Bạn nhân được một yêu cầu phê duyệt bài viết </p>
    <p>Vui lòng ấn vào link phía dưới để xem chi tiết bài viết</p>
    <br>
    <p>URL: {{ $data['url'] ?? ""}}</p>
    <p>Yêu cầu phê duyệt bài viết từ: {{$data['adminRequest']->name??''}}</p>
    <p>Người đăng : {{$data['news']->admin->name ??''}}</p>
    <p>Email người đăng : {{ $data['news']->admin->email ??''}}</p>
    <p>Cộng đoàn: {{$data['news']->community->name??''}}</p>
    <p>Tên bài viết: {{$data['news']->title??''}}</p>
    <p>Chi chú : {{$data['note'] ?? ''}}</p>

</div>
</body>
</html>
