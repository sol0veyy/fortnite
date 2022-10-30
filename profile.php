<?php
    session_start();
    require('vendor/mysql.php');
    $sql = 'SELECT photo FROM user';
    $result = mysqli_query($mysql, $sql);
    $photo = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/news.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <title>Профиль</title>
</head>
<body>
    <?php require('vendor/header.php') ?>
    <div class="profile">
    <?php
        if ($_SESSION['user']['login']) {
            echo '<div class="info_profile">';
            echo '<img src="' . $_SESSION['user']['photo'] . '">';
            echo '<p> ' . $_SESSION['user']['login'] . ' </p>';
            echo '</div>';
            echo '<div class="change_profile">';
            echo '<a href="settings.php">Изменить</a>';
            echo '<a href="vendor/exit.php">Выйти</a>';
            echo '</div>';
        } else {
            echo '
            <img src="image/avatar.png">
            <div class="reg-auth">
                <a href="auth.php">Авторизоваться</a>
            </div>
            ';
        }
    ?>
    </div>
</body>
</html>