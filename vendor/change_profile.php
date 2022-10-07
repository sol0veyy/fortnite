<?php 

    session_start();
    require_once 'mysql.php';

    $login = filter_var(trim($_POST['login']));
    $avatar = $_FILES['avatar']['name'];
    if ($avatar) {
        $avatar = 'image/' . time() . $avatar;
    }
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $avatar);
    
    if ($login && $avatar) {
        $change_data = "`login` = '$login', `photo` = '$avatar'";
    } elseif ($login) {
        $change_data = "`login` = '$login'";
    } else {
        $change_data = "`photo` = '$avatar'";
    }

    echo $change_data;

    $change = mysqli_query($mysql, "UPDATE `user` SET $change_data WHERE `user`.`id` = '{$_SESSION['user']['id']}'");

    $result = mysqli_query($mysql, "SELECT * FROM `user` WHERE `id` = '{$_SESSION['user']['id']}'");
    if (mysqli_num_rows($result) > 0) {
        
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "pass" => $user['pass'],
            "photo" => $user['photo']
        ];

        header('Location: ../profile.php');

    }