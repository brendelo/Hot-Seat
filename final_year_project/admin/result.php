<?php
session_start();
?>


<html>
<head>
<title>The Hot Seat  - Result </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../quiz.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php
include("header-profile-admin.php");
include("../database.php");


extract($_SESSION);
$login = $_GET['login'];
$username = $_GET['username'];


$rs=mysql_query("select t.test_name,t.total_que,r.test_date,r.score,s.sub_name from mst_test t, mst_result r,mst_subject s where
t.test_id=r.test_id and t.sub_id=s.sub_id and r.login='$login'",$cn) or die(mysql_error());
echo "&nbsp </br> &nbsp </br> &nbsp </br>";
echo "<h1 style=\"text-align:center; text-decoration:underline; color:white;\">" . $username ."'s Result </h1>";
echo "&nbsp </br>";
echo "<input class=\"btn btn-default\" type=\"button\" 
  onClick=\"window.print()\" 
  value=\"Print Result\"/>";

if(mysql_num_rows($rs)<1)
{
	?>
	<div class="col-xs-8 col-xs-offset-2" style="text-align: center; border: 0px solid transparent; background: white; border-radius: 15px; padding-bottom: 40px;">
	<?php
	echo "<br><br><h1  style=text-align:center> This Candidate Is Yet To Take Any Examinations. </h1>";
	?>
	<a style="text-align: center;" href="profile.php?login=<?php echo $login;?>"><strong>Back</strong></a>
	</div>
<?php
	exit;
}

?>
<div class="row">
	<div class="col-xs-8 col-xs-offset-2" style="border: 0px solid #e3e3e3; background: transparent; border-radius:20px; text-align: center;">
		<a href="profile.php?login=<?php echo $login;?>">Back</a>

<?php
echo "<table style=\"border:solid; border-radius: 20px; color:#c3c3c3; \" class=\"table table-bordered table-hover\" align=center>
<tr class=\"style2 danger\" style=\" line-height: 2.5;\"><td align=center width=200> Course <td align=center width=300>Examination Name <td align=center> Total Marks <td align=center> Score<td align=center> Time of Examination";
while($row=mysql_fetch_row($rs))
{
echo "<tr class=style8><td class=success>$row[4] <td class=active>$row[0] <td align=center class=warning> $row[1] <td align=center class=info> $row[3] / $row[1]<td align=center class=warning> $row[2] ";
}
echo "</table>";
?>

	</div>
</div>
</body>
</html>
