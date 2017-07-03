<?php
    session_start();
    require '_database/database.php';
    $user_username = mysqli_real_escape_string($database,$_REQUEST['loginid']);
    if(!$_SESSION['loginid']){
        header("location:$user_username");
    }
?>