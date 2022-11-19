<?php
    session_start();
    require_once 'vendor/mysql.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/news.css">
    <link rel="stylesheet" href="assets/css/message.css">
    <title>Сообщения</title>
</head>
<body>
    <?php require_once 'vendor/header.php'; ?>

    <div class="block_message">
        <?php
            $resultFriend = $mysql -> query("SELECT * FROM `messagesfriends` WHERE `user` = '{$_SESSION['user']['id']}'");
            while($friends = mysqli_fetch_array($resultFriend)) {
                $resultInfoFriend = $mysql -> query("SELECT * FROM `user` WHERE `id` = '{$friends['friend']}'");
                $infoFriend = mysqli_fetch_array($resultInfoFriend);
                echo "
                    <div class='message_block'>
                        <a href='friend_messages.php?id={$friends['friend']}'>
                        <img src='{$infoFriend['photo']}'> 
                        <div class='info_friend'>
                            <h2>{$infoFriend['login']}</h2>
                            </a>
                        </div>
                    </div>
                ";
            }
        ?>
    </div>
</body>
</html>