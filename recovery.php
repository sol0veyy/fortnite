<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Восстановление пароля</title>
</head>
<body>
                <h1 class="section-title">Восстановление пароля</h1>
                <form class="row g-3" method="post">

                    <div class="col-md-6 offset-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="name@example.com">
                            <label class="required" for="email">E-mail</label>
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3">
                        <button type="submit" name="recover" class="btn btn-danger">Отправить</button>
                    </div>
                </form>

</body>
</html>