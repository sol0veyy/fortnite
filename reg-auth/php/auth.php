<?php
    $login = filter_var(trim($_POST['login']));
    $pass = filter_var(trim($_POST['pass']));

    require('../../mysql.php');

    $result = $mysql -> query("SELECT * FROM `user` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user = $result -> fetch_assoc();
    if (count($user) == 0) {
        echo "Такой пользователь не найден";
        exit();
    }
    
    setcookie('user', $user['login'], time() + 3600, "/");

    $mysql -> close;

    header('Location: /');
?>