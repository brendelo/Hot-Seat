<?php
session_start();
include("database.php");
extract($_POST);
extract($_SESSION);
if(isset($_POST['submit']) && ($_POST['submit'] == 'Finish'))
//if($_POST['submit']$submit=='Finish')
{
	mysql_query("delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	unset($_SESSION[qn]);
	header("Location: index.php");
	exit;
}
?>

<html>
<head>
<title>The Hot Seat - Review Questions </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header-after-login.php");
?>
&nbsp </br>
&nbsp </br>
&nbsp </br>
&nbsp </br>
<div class="col-xs-6 col-xs-offset-3">
       <h2 class='style8' style="font-size: 50px; font-family: matura mt; color: white; background: #b3b3b3; border-radius:20px;
	   padding-bottom: 20px; padding-top: 20px; " align=center> Review of Answered Questions </h2>
</div>

<?php
if(!isset($_SESSION[qn]))
{
		$_SESSION[qn]=0;
}
else if($submit=='Next Question' )
{
	$_SESSION[qn]=$_SESSION[qn]+1;
	
}

$rs=mysql_query("select * from mst_useranswer where sess_id='" . session_id() ."'",$cn) or die(mysql_error());
$result = mysql_num_rows($rs);
mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs); ?>


<div class="row">
	<div class="col-md-4 col-md-offset-4" style="background:white; opacity: 0.9; border-radius:25px;">
<?php
echo "<form name=myfm method=post action=review.php>";

$n=$_SESSION[qn]+1;
echo "<h2>Question: ".  $n ." of  " . $result ."</h2>";
echo "<h4><span class=style2>$row[2]</h4> </br>";
echo "<table class =\"table table-hover\">";
echo "<tr><td class=".($row[7]==1?'tans':'style8')."> A). $row[3]";
echo "<tr><td class=".($row[7]==2?'tans':'style8')."> B). $row[4]";
echo "<tr><td class=".($row[7]==3?'tans':'style8')."> C). $row[5]";
echo "<tr><td class=".($row[7]==4?'tans':'style8')."> D). $row[6]";
echo "</table></table>";
if($_SESSION[qn]<mysql_num_rows($rs)-1){
echo "&nbsp </br>";
echo "&nbsp </br>";
echo "&nbsp </br>";
echo "&nbsp </br>";
echo "<button type=submit style=\" width:100%; \"class=\"btn btn-primary\" name=submit value='Next Question'>Next Question</button></form>";
echo "<button type=submit style=\" width:100%; \"class=\"btn btn-success\" name=submit value='Finish'>Finish</button></form>";
}else{
	echo "&nbsp </br>";
	echo "&nbsp </br>";
	echo "&nbsp </br>";
	echo "&nbsp </br>";
echo "<button type=submit style=\" width:100%; \"class=\"btn btn-success\" name=submit value='Finish'>Finish</button></form>";}


?>
	</div>
	</div>
