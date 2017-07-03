<?php
session_start();
error_reporting(1);
include("database.php");

extract($_POST);
extract($_GET);
extract($_SESSION);
/*$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs))
{
unset($_SESSION[qn]);
exit;
}*/
if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
//header("location:quiz.php");
}
if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
	header("location: index.php");
}

?>


<html>
<head>
<title>The Hot Seat</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
//
<?php

//$t = $_GET['testid'];
//$s = $_GET['subid'];
//$sec = $_GET['tim'];
	
$tim = "select * from mst_test where test_id = $testid";
	$ti = mysql_query($tim, $cn);
	$exam = mysql_fetch_array($ti);
	
if (isset($_SESSION['targetdate'])) {
    // session variable_exists, use that
    $targetDate = $_SESSION['targetdate'];
} else {
    // No session variable, read from mysql
	
    $dateFormat = "d F Y -- g:i a";
	$tt = $exam['time'];
    $targetDate = time() + ( $timer*60);
    $_SESSION['targetdate'] = $targetDate;
}

$actualDate = time();
$secondsDiff = $targetDate - $actualDate;
$remainingDay     = floor($secondsDiff/60/60/24);
$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-         ($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-    ($remainingHour*60*60))-($remainingMinutes*60));
$actualDateDisplay = date($dateFormat,$actualDate);
$targetDateDisplay = date($dateFormat,$targetDate);

?>


   <script type="text/javascript">
      
      
	  
      var minutes = <?php echo $remainingMinutes; ?>  
      var seconds = <?php echo $remainingSeconds; ?> 
      function setCountDown ()
      {
          seconds--;
          if (seconds < 0){
             minutes--;
             seconds = 59
          }
          if (minutes < 0){
              hours--;
              minutes = 59
          }
         
          document.getElementById("remain").innerHTML = "  "+minutes+" min    "+seconds+" sec";
          SD=window.setTimeout( "setCountDown()", 1000 );
          if (minutes == '00' && seconds == '00') { 
              seconds = "00"; window.clearTimeout(SD);
			  window.alert(" YOUR TIME IS UP ");
              window.location = "overview.php"
          } 

       }
    </script>

</head>

<style>
            #txt {
  border:none;
  font-family:verdana;
  font-size:20pt;
  font-weight:bold;
  border-right-color:#FFFFFF;
  display: inline;
  
}
        </style>

</head>

<body>
<?php include 'controllers/base/head.php' ?>
<?php
include("header-after-login.php");




$query="select * from mst_question";

$rs=mysql_query("select * from mst_question where test_id=$testid ",$cn) or die(mysql_error());
if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	mysql_query("delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	$_SESSION[trueans]=0;
	
}
else
{	
		if($submit=='Next Question' && isset($ans))
		{
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if(($submit=='Get Result'&& isset($ans)))
		{
				
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				echo "<h2 style=\"text-align:center; text-decoration:underline;\"> Result Overview </h>";
				$_SESSION[qn]=$_SESSION[qn]+1;
				$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
				$total = mysql_num_rows($rs);
				
				?>
<div class="row">
	<div class="col-xs-4 col-xs-offset-4">

			<?php
				echo "<Table class=\"table \" align=center>";
				echo "<tr class=info><td> Total No Of Questions : <td>".$total;
				echo "<tr class=warning><td>Total No of Questions Answered/Viewed :<td> $_SESSION[qn]";				
				echo "<tr class=success><td> No of Correct Answers : <td>".$_SESSION[trueans];
				$w=$total-$_SESSION[trueans];
				$c=$total-$w;
				echo "<tr class=danger><td>No Of Wrong Answers :<td> ". $w;
				echo "<tr class=active><td> Score :<td> " .$c."/". $total;
				echo "</table>";
				mysql_query("insert into mst_result(login,test_id,test_date,score) values('$login',$tid,NOW(),$_SESSION[trueans])") or die(mysql_error());
				echo "<h3 align=center><a href=review.php> Review Question(s)</a> </h3>";
				
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
		}
		
}
$rs=mysql_query("select * from mst_question where test_id=$testid " ,$cn) or die(mysql_error());
shuffle($rs);
$total = mysql_num_rows($rs);
if($_SESSION[qn]>mysql_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "&nbsp </br>";
echo "&nbsp </br>";
echo "&nbsp </br>";
echo "&nbsp </br>";
echo "&nbsp </br>";
echo "&nbsp </br>";
echo "<h1 style=\"color:blue; text-align:center; font-family:Garamond;\">No Questions Uploaded At This Time </h1>";

echo "<h3 style=\"color:blue; text-align:center; font-family:Garamond;\">Please <a href=index.php> Try Again Later</a></h3>";

exit;
}
mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs);

echo "<form name=myfm method=post >";

$n=$_SESSION[qn]+1; ?>

<div class="row">
	<div class="#">
		
		
		<h2 class='style8' style="font-size: 50px; font-family: matura mt; color: white; background: #b3b3b3; border-radius:20px;
	   padding-bottom: 20px; padding-top: 20px; " align=center><?php echo $exam['test_name']; ?></h2>
		
		
	</div>
</div>

<div class="row">
	<div class="col-xs-5 col-xs-offset-1" style="border: 2px solid white; border-radius: 25px; background: white; opacity: 0.8">
<?php
echo "<h2> Question: ".  $n ." of " . $total . "</h2>";
echo "<h4><span class=style2> $row[2] </h4> </br>";
echo "<table class=\"table table-hover\">";
echo "<tr><td><input type=radio name=ans value=1> A. &nbsp $row[3] </br>";
echo "<tr><td><input type=radio name=ans value=2> B. &nbsp $row[4] </br>";
echo "<tr><td><input type=radio name=ans value=3> C. &nbsp $row[5] </br>";
echo "<tr><td><input type=radio name=ans value=4> D. &nbsp $row[6] </br>";
echo "</table>";
if($_SESSION[qn]<mysql_num_rows($rs)-1){
echo "<button class= \"btn btn-primary\" type=submit name=submit value='Next Question'> Next Question </button></form> &nbsp"; 
	}
else{
echo "<button class= \"btn btn-success\" type=submit name=submit onClick=\" return window.confirm('Are You Sure?');\" value='Get Result'> Submit </button></form>";}
//echo "</table></table>";
?>
	</div>
	
	<div class="col-xs-1" >
		

		</div>



	<div class="col-xs-3 col-xs-offset-1" >
		&nbsp </br>
		&nbsp </br>
		<div style="border: solid #e3e3e3; text-align: center; background: white; ">
			<body onLoad="setCountDown();" style="font-size: 35px;">
				<h2><strong>Time Remaining !!!</strong></h2>
   <div id="remain"style="font-size: 45px; font-family: Garamond; background: #f3f3f3; opacity: 0.9;" >
         <?php echo "$remainingHour hours, $remainingMinutes minutes, $remainingSeconds seconds";?>
   </div>
			</body>
		</div>
		
		&nbsp </br>
		&nbsp </br>
		&nbsp </br>
		
		<div style="border: solid; color: #e3e3e3;">
<?php
if($_SESSION[qn] < mysql_num_rows($rs)-1){
echo "<button class= \"btn btn-success\" style = \"width: 100%; \"type=submit name=submit onClick=\" return window.confirm('Are You Sure?');\" value='Get Result'> End Exam </button></form>";}

?>
		</div>
		
	</div>
</div>
</body>
</html>