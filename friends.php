<?php

    session_start();
    require_once 'vendor/mysql.php';
    $result = $mysql -> query("SELECT * FROM `user_friends` WHERE user = {$_SESSION['user']['id']}");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/news.css">
    <link rel="stylesheet" href="assets/css/friends.css">
    <title>Друзья</title>
</head>
<body>
    <?php require('vendor/header.php') ?>
    
    <div class="friends_block">
        <button onclick="showAddFriend()">Добавить в друзья</button>
        <form action="vendor/add_friend.php" method="post" id="addFriendForm">
            <label>Логин:</label>
            <input type="text" name="login">
            <br><br>
            <input type="submit" value="Отправить запрос">
            <input onclick="closeAddFriend()" type="button" value="Отмена">
        </form>
        <?php
        
            while ($friendID = mysqli_fetch_array($result)) {
                $resultFriend = $mysql -> query("SELECT * FROM `user` WHERE id = {$friendID['friend']}");
                while ($friend = mysqli_fetch_array($resultFriend)) {
                    echo "
                        <div class='block__friends'>
                            <a href='profile.php?id={$friend['id']}'>
                            <img src='{$friend['photo']}'>
                            <div class='info_friend'>
                                <h2>{$friend['login']}</h2>
                                </a>
                            </div>
                        </div>
                    ";
                }
            }

        ?>
    </div>

    <script src="/components/friends.js"></script>
</body>
</html>