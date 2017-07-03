<?php include 'controllers/base/head.php' ?>
<?php

require "components/database.php";
    $current_user = $_SESSION['loginid'];
    $sql = "SELECT * FROM mst_admin WHERE loginid='$current_user'";
    $result = mysqli_query($database,$sql);
    while($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
?>
 <td>
	//<?php
	//if(isset($_SESSION['login']))
	//{
	// echo "<div align=\"right\"><strong><a href=\"index.php\"> Home </a>|<a href=\"signout.php\">Signout</a></strong></div>";
	// }
	//	 else
	//{
	//	echo "&nbsp;";
	// }
	//?>
	</td>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; 	charset=iso-8859-1">
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="quiz.css" rel="stylesheet" 	type="text/css">
		
		<link rel="stylesheet" href="template/css/bootstrap.min.css">
		<link rel="stylesheet" href="template/css/animate.min.css">
		<link rel="stylesheet" href="template/css/font-awesome.min.css">
		<link rel="stylesheet" href="template/css/owl.theme.css">
		<link rel="stylesheet" href="template/css/owl.carousel.css">
		<link rel="stylesheet" href="template/css/style.css">
		
		<script src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js" ></script>
	</head>
</html>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->

</style>
<section class="navbar navbar-default navbar-fixed-top sticky-navigation" role="navigation">
	<div class="fluid-container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="login.php" class="navbar-brand"><img src="../userfiles/ARKTECH.PNG" alt="THE HOT SEAT" ></a>
		</div>
		            
				<div class="navbar-collapse collapse" id="navbar-collapse1">
	           <ul class="nav navbar-nav">
				<li>
                       <a href="login.php"><i class="fa fa-home smoothScroll"></i> Home</a>
                   </li>
	               
				   <!--<li>
					<a href="admin/index.php" class="smoothScroll">Administrator</a>
				   </li>-->
	           </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $row['username'];?> <strong class="caret"></strong></a>                  
                        <ul class="dropdown-menu">
                           
                        </ul>
                    </li>	
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars" style="font-size: 1.27em;"></i>
                        </a>
						 <!--<a href="components/logout.php"><i class="fa fa-mail-reply"></i> Logout</a>-->
                        <ul class="dropdown-menu">
                            <li>
                                <a href="components/logout.php"><i class="fa fa-mail-reply"></i> Logout</a>
                            </li>
                        </ul>
                    </li>	
                </ul>
	        </div><!--/.nav-collapse -->
	     
      <!-- ./Navbar1 -->
	  <?php } ?>
			
			</ul>
		</div>

	</div>
</section>
<!--&nbsp;</br>
&nbsp;</br>
&nbsp;</br>
&nbsp;</br>-->

  <?php @$_SESSION['loginid']; 
  error_reporting(1);
  ?>
  </td>
   
	
  </tr>
  
</table>
