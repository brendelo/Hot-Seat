<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC>
<html>
	<head>
		<title>Welcome to The Hot Seat</title>
		<meta http-equiv="Content-Type" content="text/html; 	charset=iso-8859-1">
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		
		
		<link rel="stylesheet" href="template/css/bootstrap.min.css">
		<link rel="stylesheet" href="template/css/animate.min.css">
		<link rel="stylesheet" href="template/css/font-awesome.min.css">
		<link rel="stylesheet" href="template/css/owl.theme.css">
		<link rel="stylesheet" href="template/css/owl.carousel.css">
		<link rel="stylesheet" href="template/css/style.css">
		<link href="quiz.css" rel="stylesheet" 	type="text/css">
		
		<script src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js" ></script>


	</head>
<body>   
<?php include 'controllers/base/head.php' ?>     
<?php

	include_once("header.php");
	require ("header-after-login.php");
	include("database.php");
extract($_POST);

if(isset($submit))
{
	$pass = md5($pass);
	$rs=mysql_query("select * from mst_user where login='$loginid' and pass='$pass'");
	if(mysql_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION[login]=$loginid;
		
	}
}
if (isset($_SESSION[login]))
{
	require ("header-after-login.php");
	
	
	while($result = mysql_fetch_array($rs)){
	echo "<h1 align=center style=\"color:white;\"> Hello " . $result['username'] . "</h1>";
	}
//echo "<h1 align=center>Hello $loginid</h1>";
?>
	&nbsp </br>
	&nbsp </br>
	&nbsp </br>
	
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2">
       <h2 class='style8' style="font-size: 50px; font-family: matura mt; color: #f2f2f2; background: #b3b3b3; border-radius:20px;
	   padding-bottom: 20px; padding-top: 20px; " align=center>You Are Now Seating In "<strong style="color: #ff0000;">The Hot Seat!!!</strong>"</h2> 
		&nbsp </br>
		&nbsp </br>
		&nbsp </br>
		&nbsp </br>
		
        <div class="col-xs-3 col-xs-offset-1" style="background-color: #f2f2f2; border-radius: 25px; padding: 10px; ">
          <img class="img-circle" src="image/subjectforexam.jpg" alt="Generic placeholder image" width="60%" height="140">
          <h2>Take An Exam</h2>
          <p>Please, Proceed to choose from a list of courses for which you wish to take the examination.</p>
          <a style="width: 100%;" class="btn btn-primary" href="sublist.php" role="button">Proceed &raquo;</a>
        </div><!-- /.col-lg-4 -->
        <div class="col-xs-3 col-xs-offset-4" style="background-color: #f2f2f2; border-radius: 25px; padding: 10px;">
          <img class="img-circle" src="image/result.jpg" alt="results" width="60%" height="140">
          <h2>Check Your Results</h2>
          <p>Please, click on the button below to view the results for all examinations previously taken.</p>
          <a style="width: 100%;" class="btn btn-success" href="result.php">Check &raquo;</a>
        </div><!-- /.col-lg-4 -->
      </div>
		</div><!-- /.row -->
	<?php

//		echo '<table width="28%"  border="0" align="center">
//  <tr>
//    <td width="10%" height="80" valign="bottom"><img src="image/subjectforexam.jpg" width="100" height="100" align="middle"></td>
//    <td width="93%" valign="bottom" bordercolor="#0000FF"> <a href="sublist.php" class="style4"> SELECT A COURSE FOR THE EXAM </a></td>
//  </tr>
//  "&nbsp;
//  <tr padding-top:100px>
//    <td height="58" valign="bottom"><img src="image/result.jpg" width="100" height="100" align="absmiddle"></td>
//    <td valign="bottom"> <a href="result.php" class="style4"> CHECK RESULTS </a></td>
//  </tr>
//</table>';
   
		exit;
		

}


?>
	


	
<!-- LOGIN FORM STARTS HERE-->


			<!--
				<form name="form1" method="post" action="" class="form-horizontal">
				  
			  <div class="form-group">
				<label for="loginid2" class="col-sm-2 control-label"> Login ID </label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="loginid" id="loginid2" placeholder="User ID" required >
				</div>
			  </div>
			  <div class="form-group">
				<label for="pass2" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" name="pass" id="pass2" placeholder="Password" required >
				</div>
			  </div>
			   <td colspan="2"><span class="errors">
						
					  </span></td>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="checkbox">
					<label>
					  <input type="checkbox"> Remember me
					</label>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-primary" name="submit" id="submit" width=100%>Sign in</button> |
				  <button type="submit" class="btn btn-success" name="submit" id="submit"><a href="signup.php">Sign Up</a></button>
				</div>
				&nbsp
					<p class="passwordreset" align:"center"; >Forgot your password? <a href="passwordreset.php">Click here</a></p>
			  </div>
			  </form> -->
																<!-- Button trigger modal -->
												  
 <section id="home" class="parallax-section" >
	<div class="container" >
		<div class="row" >

			<div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3" style=" background: #b3b3b3; border-radius: 30px; width: 50%;">
				<h3 class="wow fadeInDown" data-wow-delay="0.2s">AGB-2016</h3>
				<h1 class="wow fadeInDown"><img src="userfiles/ARKTECH3.PNG" style="width: 60%" alt="THE HOT SEAT" ></h1>
				<div align="center"; padding-bottom="50px";>
        
     

<div style="padding-bottom: 30px; padding-top: 15px; color: white;">
      
          <p>This Site will provide the Examination for various subjects of interest.</p>
		  <p>You need to <strong>Sign In</strong>.</p>
		  <p>If you do not possess an account, Please <a href="signup.php"><strong>Sign Up</strong></a></p>
				</div>
</div>
				
									<button type="button" class="btn btn-danger wow fadeInUp" data-wow-delay="1s" style="align:auto"
												data-toggle="modal" data-target="#myModal">Sign In</button>
													
												  
													
													
													  <a href="signup.php" class="btn btn-default smoothScroll wow fadeInUp" data-wow-delay="1.6s">Sign Up</a>
													
												  &nbsp </br>
												  
												  <!-- Modal -->
												  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="
																					background: url('assets/img/backgrounds/big/22131.jpg');">
													<div class="modal-dialog" role="document">
													  <div class="modal-content">
														<div class="modal-header">
														  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														  <h4 class="modal-title" id="myModalLabel"style="text-align: center;"> LOGIN </h4>
														</div>
														<div class="modal-body">
														  <!-- form starts-->
																<form name="form1" method="post" action="" class="form-horizontal">
					  
																<div class="form-group">
																  <label for="loginid2" class="col-sm-2 control-label"> Login ID </label>
																  <div class="col-sm-10">
																	<input type="text" class="form-control" name="loginid" id="loginid2" placeholder="User ID" required >
																  </div>
																</div>
																<div class="form-group">
																  <label for="pass2" class="col-sm-2 control-label">Password</label>
																  <div class="col-sm-10">
																	<input type="password" class="form-control" name="pass" id="pass2" placeholder="Password" required >
																  </div>
																</div>
																 <td colspan="2"><span class="errors">
																		  <?php
																		if(isset($found))
																		{
																		  echo "Invalid Username or Password";
																		}
																		?>
																		</span></td>
																<div class="form-group">
																  <div class="col-sm-offset-2 col-sm-10">
																	<div class="checkbox">
																	  <label>
																		<input type="checkbox"> Remember me
																	  </label>
																	</div>
																  </div>
																</div>
																<div class="form-group">
																  <div class=" col-sm-12">
																	<button type="submit" class="btn btn-primary" name="submit" id="submit" style="width:100%; background: blue;" >Sign in</button>																
																  </div>
																  &nbsp
																	  <p class="passwordreset" style = "text-align: center;" ><a href="passwordreset.php">Forgot your password? Click here</a></p>
																</div>
														  <!--form ends-->
														</div>
														<div class="modal-footer">
														  <!--<button type="button" class="btn btn-default" style="align: left;" data-dismiss="modal">Close</button> -->
														  <p style="text-align: center;">Don't have an account ?</p>
														  <a type="button" class="btn btn-success" style="width: 100%; color:white; background: green; margin-top:4px;" name="submit" id="submit" href="signup.php">Sign Up</a>
														</div>
													  </div>
													</div>
												  </div>
													&nbsp </br>
		&nbsp </br>
		
				
			</div>

		</div>
	</div>
		
</section>
													

</body>
</html>
