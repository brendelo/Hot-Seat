
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
extract($_POST);

$answer = md5($answer);
$pass = md5($pass);
include("database.php");
$rs=mysql_query("select * from mst_user where login='$lid'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Login Id Already Exists </div>";
	exit;
}
$query="insert into mst_user(user_id,login,pass,username,dob,address,city,phone,email,passport,security_question,answer,created,updated)
		values('$uid','$lid','$pass','$name','$dob','$address','$city','$phone','$email','default.jpg','$question','$answer',NOW(),NOW())";
$rs=mysql_query($query)or die("Could Not Perform the Query");
if ($rs){
echo "<br><br><br><div class=\"alert alert-success\" role=\"alert\" style=\"font-size: 20px; text-align:center;\">Your Login ID <strong>' {$lid} '</strong> has been Created Sucessfully</div>";
echo "<br><div class=head1>Please Login using your Login ID </div>";
echo "<br><div class=head1><a href=index.php>Login</a></div>";
}

?>
</body>
</html>


