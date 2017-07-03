<?php
    session_start();
    require '_database/database.php';
    $user_username = mysqli_real_escape_string($database,$_REQUEST['login']);
    if(!$_SESSION['login']){
        header("location:$user_username");
    }
?>