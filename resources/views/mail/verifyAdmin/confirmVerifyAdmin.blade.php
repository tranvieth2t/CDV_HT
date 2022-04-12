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
    <p>Your email address has been registered with an admin account.
        Please click on the url to verify the account.</p>
    <br>
    <p>URL: {{ $data['url'] }}</p>
    <p>Account Information</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Please avoid revealing your account information</p>
</div>
</body>
</html>
