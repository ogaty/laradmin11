<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laradmin</title>
</head>
<body>
<form action="/auth/login" method="post">
    @csrf
    email: <input type="text" name="email"><br>
    password: <input type="password" name="password"><br>
    <input type="submit" value="送信">
</form>
</body>
</html>
