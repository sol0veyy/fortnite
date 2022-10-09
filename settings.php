<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/news.css">
    <link rel="stylesheet" href="assets/css/settings.css">
    <title>Настройки</title>
</head>
<body>
    <?php require_once 'vendor/header.php';?>
    <form action="vendor/change_profile.php" method="post" enctype="multipart/form-data">
        <label>Изменить логин</label>
        <br>
        <input name="login" type="text" placeholder="Введите новый логин">
        <br><br>
        <label>Изменить аватарку</label>
        <br>
        <input name="avatar" type="file">
        <br><br>
        <div class="bottom">
            <input type="submit" value="Изменить">
            <?php
                session_start();
                echo '<p>' . $_SESSION['message'] . '</p>';
            ?>
        </div>
    </form>
    <br>
    <button onclick="test()">Отмена</button>

    <script src="main.js"></script>
</body>
</html>