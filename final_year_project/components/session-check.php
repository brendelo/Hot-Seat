<?php
    session_start();
    require '_database/database.php';
    if(!$_SESSION['login']){
        header("location:index.php?session=notset");
    }
?>