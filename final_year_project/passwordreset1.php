<?php
session_start();
?>
<html>
<head>
<title>Password Reset</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="quiz.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js" ></script>
</head>

<body>
<?php
include("header.php");
include("database.php");
?>
  <?php
 extract($_POST);
?>

<?php


        
        if(isset($submit1)) {            
            
    $query = "SELECT * FROM mst_user
              WHERE login = {$username}" ;
    $result= mysqli_query($cn, $query);
    
    while ($row = mysqli_fetch_array($result)){
    if(mysql_num_rows($cn) == 1){
        $_SESSION[login]=$username;
    } else {
        $message =  "Login Id was not found, Please try again";
    } }
    
    if (isset($_SESSION[login]))
{
	
        echo "<h3>Security Question</h3>" . "<br />";
        echo "<form action=\"\" method=\"POST\"> ";
        echo "<p>{$row['security_question']}</p>";
        echo " Answer : <br/> <textarea type=\"text\" id=\"ans\" name=\"ans\" required></textarea>";
        echo " New Password  : <br /> <input type=\"text\" id=\"password\" name=\"password\" required/>";
        echo "<button name = \"submitted\" id = \"submitted\"> SUBMIT </button>";
        echo "</form>";
        
        exit;
        }
    }
    
?>  

</body>
</html>
<?php


        
        if(isset($submit1)) {            
            
    $query = "SELECT * FROM mst_user
              WHERE login = {$username}" ;
    $result= mysqli_query($cn, $query);
    
    while ($row = mysqli_fetch_array($result)){
    if(mysql_num_rows($cn) == 1){
        $_SESSION[login]=$username;
    } else {
        $message =  "Login Id was not found, Please try again";
    } }
    
    if (isset($_SESSION[login]))
{
	
        echo "<h3>Security Question</h3>" . "<br />";
        echo "<form action=\"\" method=\"POST\"> ";
        echo "<p>{$row['security_question']}</p>";
        echo " Answer : <br/> <textarea type=\"text\" id=\"ans\" name=\"ans\" required></textarea>";
        echo " New Password  : <br /> <input type=\"text\" id=\"password\" name=\"password\" required/>";
        echo "<button name = \"submitted\" id = \"submitted\"> SUBMIT </button>";
        echo "</form>";
        
        exit;
        }
    }
    
?>