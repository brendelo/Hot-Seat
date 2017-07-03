<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
if($submit=='Finish')
{
	mysql_query("delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	unset($_SESSION[qn]);
	header("Location: index.php");
	exit;
}

?>
<html>
    <head>
        <title>The Hot Seat</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php include 'controllers/base/head.php' ?>
<?php
include("header-after-login.php");

?>
<?php 
		
				
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', '$tid','$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans];
				}
				echo "<h2 style=\"text-align:center; text-decoration:underline;\"> Result Overview </h>";
				$_SESSION[qn]=$_SESSION[qn];
				$rs=mysql_query("select * from mst_question where test_id='$tid'",$cn) or die(mysql_error());
				$total = mysql_num_rows($rs);
				?>
<div class="row">
	<div class="col-xs-4 col-xs-offset-4">

			<?php
            
            $_SESSION['total'] = $total;
				echo "<Table class=\"table \" align=center>";
				echo "<tr class=info><td> Total No Of Questions : <td>".$_SESSION['total'];
				echo "<tr class=warning><td>Total No of Questions Viewed & Answered :<td>". $_SESSION[qn];				
				echo "<tr class=success><td> No of Correct Answers : <td>".$_SESSION[trueans];
				$w=$_SESSION['total']-$_SESSION[trueans];
				$c=$_SESSION['total']-$w;
				echo "<tr class=danger><td>No Of Wrong Answers :<td> ". $w;
				echo "<tr class=active><td> Score :<td> " .$c."/". $_SESSION['total'];
				echo "</table>";
				mysql_query("insert into mst_result(login,test_id,test_date,score) values('$login','$tid',NOW(),'$_SESSION[trueans]')") or die(mysql_error());
				//echo "<h3 align=center><a href=index.php> Home </a> </h3>";
                echo "<form action=\"overview.php\" method=\"post\" >";
                echo "<button type=submit style=\" width:100%; \"class=\"btn btn-success\" name=submit value='Finish'> Home </button></form>";
				
				?>
			</div>
	</div>
			<?php
				
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				unset($_SESSION['targetdate']);
				exit;
		
		
?>
</body>
</html>