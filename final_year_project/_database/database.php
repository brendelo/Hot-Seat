<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "quiz_new";
    //$prefix = "";
    //$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
    //mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");
    $database=mysqli_connect($hostname,$user,$password,$database) or die("Opps some thing went wrong");
    error_reporting(0);
?>