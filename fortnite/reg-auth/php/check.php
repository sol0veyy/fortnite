<?php
    $login = filter_var(trim($_POST['login']));
    $pass = filter_var(trim($_POST['pass']));

    if (mb_strlen($login) < 3 || mb_strlen($login) > 30) {
        echo "Недопустимая длина логина";
        exit();
    }
    else if (mb_strlen($pass) < 8 || mb_strlen($pass) > 30) {
        echo "Недопустимая длина пароля (от 8 до 30 символов)";
        exit();
    }

    $mysql = new mysqli('localhost', 'root', 'root', 'fortnite');
    $mysql -> query("INSERT INTO `user` (`login`, `pass`)
    VALUES('$login', '$pass')");

    $mysql -> close;

    header('Location: /');
?>