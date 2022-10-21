<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reg-auth.css">
    <link rel="stylesheet" href="assets/css/news.css">
    <title>Регистрация</title>
</head>

<body>
    <?php require('vendor/header.php'); ?>
    <div class="main">
        <div class="auth">
            <h1>Регистрация</h1>
            <form action="vendor/check.php" method="post">
                <input type="text" class="form-control" name="login" id="login" placeholder="Логин">
                <br>
                <input type="email" class="form-control" name="pass" id="pass" placeholder="Почта">
                <br>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Пароль">
                <br>
                <input type="submit" value="Зарегистрироваться">
                <p>
                    У вас есть аккаунт? - <a href="auth.php">авторизируйтесь</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>