
<?php
session_start();

error_reporting(1);
?>

<html>
<head>
<title>Adminstrative Area </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>
	
<?php

extract($_POST);


$pass = md5($pass);

if(isset($submit))
{
	include("../database.php");
	
	
	$rs=mysql_query("select * from mst_admin where loginid='$loginid' and pass='$pass'",$cn) or die(mysql_error());
	if(mysql_num_rows($rs)<1)
	{
		echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
		exit;
		
	}
	else {
	$_SESSION['loginid']= $loginid;}
	
}
 if(!isset($_SESSION[loginid]))
{
	echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
		exit;
}
include("header-after-login-admin.php");
?>

<h2 style="font-size:40px; padding-bottom: 20px;"class="head1">Welcome to The Admistrative Area </h2>
<div class="row">
	<div class="col-xs-10 col-xs-offset-1" style="background : white; opacity : 0.7; border: 15px inset; border-radius: 25px; padding: 50px; margin-right: auto; ">
<div style=" margin: auto;">
		<div class="col-xs-2 col-xs-offset-1">
		<a class="btn btn-active" style="font-size: 50px;" href="subadd.php"> <strong>+</strong>Subject</a> 
		</div>
		
		<div class="col-xs-2 col-xs-offset-2">
		<a class="btn btn-active" style="font-size: 50px;" href="testadd.php"> <strong>+</strong>Exam</a>
		</div>
		
		<div class="col-xs-2 col-xs-offset-2">
		<a class="btn btn-active" style="font-size: 50px;" href="questionadd.php"> <strong>+</strong>Question</a>
		</div>
</div>
	</div>
</div>

&nbsp </br>
&nbsp </br>
&nbsp </br>
&nbsp </br>
<div class="row">
	<div class="col-xs-10 col-xs-offset-1" style="background : white; opacity : 0.7; border: 15px  outset; border-radius: 25px;  padding: 50px;">

		<div class="col-xs-2 col-xs-offset-1">
		<a class="btn btn-active" style="font-size: 50px;" href="profilehomeadmin.php"> Profiles </a>
		</div>
		
		<div class="col-xs-2 col-xs-offset-2">
		<a class="btn btn-active" style="font-size: 50px;" href="results_admin.php"> Results </a>
		</div>
		
		<div class="col-xs-2 col-xs-offset-2">
		<a class="btn btn-active" style="font-size: 50px;" href="editquestions.php"> Edit Questions </a>
		</div>
		

	</div>
</div>
</body>
</html>







<!--<div style=" box-shadow:2px 1px 2px 2px #CCCCCC; opacity: 0.4; background: white; ; border: 4px dashed; border-radius:75px;">
<div style="margin-left:20%;padding-top:5%">
<ul class="nav nav-pills nav-stacked" style="text-align: center;">
  <li role="presentation" style=" padding-top: 20px; padding-bottom: 20px;" class="success col-md-9"><a href="subadd.php">Add Subject</a></li>
  <li role="presentation" style=" padding-top: 20px; padding-bottom: 20px;" class="success col-md-9"><a href="testadd.php">Add a New Examination</a></li>
  <li role="presentation" style=" padding-top: 20px; padding-bottom: 20px;" class="success col-md-9"><a href="questionadd.php">Add Question(s)</a></li>
  <li role="presentation" style=" padding-top: 20px; padding-bottom: 20px;" class="success col-md-9"><a href="profilehomeadmin.php"> Profiles </a></li>
  <li role="presentation" style=" padding-top: 20px; padding-bottom: 20px;" class="success col-md-9"><a href="results_admin.php"> Results </a></li>
  <li role="presentation" style=" padding-top: 20px; padding-bottom: 20px;" class="success col-md-9"><a href="editquestions.php"> Edit Questions </a></li>
</ul>
<p align="center" class="head1">&nbsp;</p>
</div>
</div>-->

