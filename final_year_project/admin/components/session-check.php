<?php
    session_start();
    require '_database/database.php';
    if(!$_SESSION['loginid']){
        header("location:login.php?session=notset");
    }
?>