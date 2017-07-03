<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>The Hot Seat</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		
		
		<link rel="stylesheet" href="template/css/bootstrap.min.css">
		<link rel="stylesheet" href="template/css/animate.min.css">
		<link rel="stylesheet" href="template/css/font-awesome.min.css">
		<link rel="stylesheet" href="template/css/owl.theme.css">
		<link rel="stylesheet" href="template/css/owl.carousel.css">
		<link rel="stylesheet" href="template/css/style.css">
<link href="quiz.css" rel="stylesheet" type="text/css">


<script src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js" ></script>
</head>
<body>
	<?php include 'controllers/base/head.php' ?>
<?php
include("header-after-login.php");
include("database.php");

//$pass = $_GET['subid'];
//$sql = mysql_query("select * from mst_test where sub_id=$pass");
//while($row = mysql_fetch_array($sql)){
//	$fn = $row["test_id"];
//	$str = $row["test_name"];
//	$tim = $row["time"];
//	
//	$gee="<tr><td align=center ><a href=quiz.php?testid=$fn&&subid=$pass&&tim=$tim>$str</a></td></tr>";
//	
//	echo "$gee";
//}


extract($_POST);
extract($_GET);
extract($_SESSION);
$rs1=mysql_query("select * from mst_subject where sub_id=$subid");
$row1=mysql_fetch_array($rs1);

?>


<div class="col-xs-8 col-xs-offset-2">
       <h2 class='style8' style="font-size: 50px; font-family: matura mt; color: #f2f2f2; background: #b3b3b3; border-radius:20px;
	   padding-bottom: 20px; padding-top: 20px; " align=center><?php echo  $row1[1]; ?></h2>
	   
	   <h3 style="text-align: center; font-size: 20px; color: black;">Please read the instructions before you begin any examination</h3>

<?php

$rs=mysql_query("select * from mst_test where sub_id=$subid");
if(mysql_num_rows($rs)<1)
{
	echo "<br><br><h2 class=head1> No Examination Uploaded </h2>";
	?>
	   <div class="col-sm-2 col-sm-offset-5">
	   <nav>
  <ul class="pager">
    <li class="previous"  ><a href="sublist.php"><span aria-hidden="true">&larr;</span> BACK</a></li>
    <!--<li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>-->
  </ul>
</nav></div>
	   <?php
	exit;
}
?>

<div class="row">
	<div class="col-xs-2 col-xs-offset-4">
		
<button type="button" class="btn btn-danger wow fadeInUp" data-wow-delay="0.6s" style="margin: auto; font-size: 35px;"	data-toggle="modal" data-target="#myModal">INSTRUCTIONS</button>

	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">	
	
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="text-align: center; text-decoration:underline; font-size:25px;" id="gridSystemModalLabel">INSTRUCTIONS </h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
			<ul>
			<p style="text-align: center; font-size:20px;"><strong>PLEASE READ ALL INSTRUCTIONS CAREFULLY!!!</strong> </p>
				<li> ONCE YOU PROCEED TO THE NEXT QUESTION, YOU CANNOT GO BACK </li>
				
				<li> YOU MUST ANSWER A QUESTION BEFORE YOU MOVE TO THE NEXT</li>
				
				<li> IF YOU END THE EXAMINATION BEFORE THE TIMER COUNTS DOWN, YOU WILL BE GRANTED THE PRIVILEDGE TO REVIEW THE CORRECT ANSWERS BUT ONLY TO QUESTIONS ANSWERED</li>
				
				<li> IF THE COUNTDOWN TIMER ENDS, YOU WILL BE ALERTED AND THEN REDIRECTED TO THE RESULTS PAGE</li>
				<li> YOU ARE ABOUT TO TAKE AN EXAM FOR THE COURSE " <?php echo $row1[1]; ?> "</li>
				<li> PLEASE CHOOSE FROM THE LIST BELOW TO START THE EXAMINATION</li>
			</ul>
			
		  </div>
		</div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-active" style="width: 100%" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<?php
echo "<h2 class=head1> Please select the Examination </h2>";
//echo $pass;
echo $fn;
echo "<table align=center class=\"table table-hover table-striped\">";

while($row=mysql_fetch_row($rs))
{
	echo "<form name=\"frm\" method=\"post\">";
	echo "<tr><td align=center ><button type=\"submit\" name=\"submetre\" onClick=\" return window.confirm('Are You Sure you are ready to begin?');\"><font size=4>$row[2]</font></button></td></tr>";
	echo "<form>";
	
	if (isset($_POST['submetre'])){
		$ree = mysql_query("select * from mst_result where login='$login' and test_id='$row[0]'", $cn);
		if (mysql_num_rows($ree) > 0){
			$return = "<h3 style=\"text-align:center; color:blue;\">Examination already Attempted. you only get 1 attempt!!!</h3>";
					} else {
						echo "<h3 style=\" text-align:center; color:green; \">NO ATTEMPTS YET</h3>";
			echo "<tr><td align=center ><a href=quiz.php?testid=$row[0]&&subid=$subid&&timer=$row[4]
			onClick=\" return window.confirm('Are You Sure you are ready to begin?');\"><font size=4>PROCEED</font></a></td></tr>";
			//header("location: quiz.php?testid=$row[0]&&subid=$subid&&timer=$row[4] ");
			header("location:index.php");
			exit;
			
		}
	}
}
echo $return;
echo "</table>";
?>
<nav>
  <ul class="pager">
    <li class="previous"><a href="sublist.php"><span aria-hidden="true">&larr;</span> Back</a></li>
    <!--<li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>-->
  </ul>
</nav>

</div>
</body>
</html>

