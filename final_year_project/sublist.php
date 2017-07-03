<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>The Hot Seat - Courses </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include 'controllers/base/head.php' ?>
	
<?php
include("header-after-login.php");
include("database.php");

?>
&nbsp </br>
&nbsp </br>
<div class="col-xs-8 col-xs-offset-2">
       <h2 class='style8' style="font-size: 50px; font-family: matura mt; color: #f2f2f2; background: #b3b3b3; border-radius:20px;
	   padding-bottom: 20px; padding-top: 20px; " align=center>Please Choose a Course </h2>

&nbsp </br>
&nbsp </br>
&nbsp </br>
<?php

$rs=mysql_query("select * from mst_subject");
echo "<table align=center class=\"table table-hover table-striped\">";
while($row=mysql_fetch_row($rs))
{
	echo "<tr><td align=center ><a href=showtest.php?subid=$row[0]><font size=5>$row[1]</font></a></td></tr>";
}
echo "</table>";
?>
	   </div>
</body>
</html>
