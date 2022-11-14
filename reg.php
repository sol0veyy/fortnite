<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/news.css">  
    <link rel="stylesheet" href="assets/css/reg-auth.css">
    <title>Регистрация</title>
</head>

<body>
    <div class="main">
        <div class="auth">
            <h1>Регистрация</h1>
            <form action="vendor/check.php" method="post">
                <input required type="text" class="form-control" name="login" id="login" placeholder="Логин">
                <br>
                <input required type="email" class="form-control" name="email" id="email" placeholder="Почта">
                <br>
                <input required type="password" class="form-control" name="pass" id="pass" placeholder="Пароль">
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