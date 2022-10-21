<?php
    session_start();
    require_once 'mysql.php';

    $login = filter_var(trim($_POST['login']));
    $pass = filter_var(trim($_POST['pass']));

    $result = mysqli_query($mysql, "SELECT * FROM `user` WHERE `login` = '$login' AND `pass` = '$pass'");
    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "pass" => $user['pass'],
            "photo" => $user['photo'],
            "email" => $user['email']
        ];

        header('Location: ../profile.php');

    } else {
        echo "Неверный логин или пароль";
    }
?>