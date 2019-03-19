<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
    <link href="/auth/style.css" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">
</head>

<body>
<form class="form" action="" method="post">
    <table>
        <tr>
            <td><label>Email</label></td>
            <td><input type="email" name="email" required placeholder="Ваш mail" maxlength="50"></td>
        </tr>

        <tr>
            <td><label>Пароль</label></td>
            <td><input type="password" name="password" required placeholder="Ваш пароль" maxlength="50"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center"><input id="regBtn" type="submit" name="login" value="Войти"></td>
        </tr>
    </table>

</form>
</body>
</html>