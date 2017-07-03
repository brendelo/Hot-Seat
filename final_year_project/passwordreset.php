<?php
session_start();
?>
<html>
<head>
<title>Password Reset</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="quiz.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js" ></script>
</head>

<body>
<?php
include("header.php");
include("database.php");
?>  




<?php
 extract($_POST);
?>




<!-- IN THE EVENT OF A FORGOTTEN PASSWORD -->        
 <?php
                  
                  if(isset($submit1)) {            
                $result= mysql_query("SELECT * FROM mst_user
              WHERE login = '$username'");
    if(mysql_num_rows($result) == 1){
    
        $_SESSION[login1]=$username;
    }  else {
        $message =  "Login Id was not found, Please try again";
    }  } 
    
    if (isset($_SESSION[login1]))
{
	while ($row = mysql_fetch_array($result)) {
	 
	 
	 
        echo "&nbsp </br>";
		echo "&nbsp </br>";
		echo "&nbsp </br>";
        echo $message; 
        echo "<div class=\"row\"><div class=\"col-md-4 col-md-offset-4\">";
        echo "<h2><strong>Security Question</strong></h2>" . "<br />";
        echo "<form action=\"passwordreset.php\" method=\"POST\"> ";
        echo "<h4>" . $row['security_question'] . "? </h4>";
		
        echo " <div class=\"form-group\"> <label for=\"password\"> Answer </label> <br/>
        <textarea type=\"text\" class=\"form-control\" id=\"ans\" name=\"ans\" placeholder=\"Answer to Security Question\" required></textarea> </br> </div>";
        echo " <div class=\"form-group\"><label for=\"password\"> New Password </label> <br />
        <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"New Password\" required></div>";
        echo "<nav>
                <ul class=\"pager\">
                  <li class=\"previous\"><a href=\"passwordreset.php\"><span aria-hidden=\"true\">&larr;</span> BACK </a></li>
                  <button class=\"next btn btn-default\" type=\"submit\" name = \"submitted\" id = \"submitted\"> PROCEED <span aria-hidden=\"true\">&rarr;</span></button>                  
                </ul>
              </nav>";
		      
        echo "</form>";
        echo "</div></div>";
        //<button   type=\"submit\" class="btn btn-primary signupbutton" name="submit1" id="submit1" > Submit </button>
        exit;
        } 
    }
	
?>
<!-- Checking your answer and changing the password -->
<?php
 
     
		if(isset($_POST['submitted'])){
		 $ans = $_POST['ans'];
		 $ans = md5($ans);
		 $password = $_POST['password'];
		 $password = md5($password);
		 $result= mysql_query("SELECT * FROM mst_user
              WHERE answer = '$ans'");
    if(mysql_num_rows($result) == 1){
	  $_SESSION[login1]=$ans;
    }  else {
        $message =  "Incorrect Answer, Please try again";
    }  } 
    
	//changing the password
	if (isset($_SESSION[login1]))
{
	while ($row = mysql_fetch_array($result)) {
	 $query = "UPDATE mst_user SET
			  pass = '$password'
			  WHERE answer = '$ans'";
	$changepassword = mysql_query($query);
	if($changepassword){
	 $message =  "Password Changed Successfully!!!";
	} else {
	 $message = "It Did Not Work, Please Try Again";
	}
	}	
	}
 ?>
<!-- End of Event - FORGOTTEN PASSWORD -->


<!-- IN THE EVENT OF A FORGOTTEN USERNAME -->        
<?php
                  
                  if(isset($submit2)) {            
                $result= mysql_query("SELECT * FROM mst_user
              WHERE email = '$email'");
    if(mysql_num_rows($result) == 1){
    
        $_SESSION[login2]=$email;
    }  else {
        $message =  "Email Address was not found, Please try again.";
    }  } 
    
    if (isset($_SESSION[login2]))
{
	while ($row = mysql_fetch_array($result)) {
        		
		//
		echo $message; 
        echo "<div class=\"row\"><div class=\"col-md-4 col-md-offset-4\">";
        echo "<h2><strong>Security Question</strong></h2>" . "<br />";
        echo "<form action=\"passwordreset.php\" method=\"POST\"> ";
        echo "<h4>" . $row['security_question'] . "? </h4>";
		
        echo " <div class=\"form-group\"> <label for=\"password\"> Answer </label> <br/>
        <textarea type=\"text\" class=\"form-control\" id=\"ans\" name=\"ans\" placeholder=\"Answer to Security Question\" required></textarea> </br> </div>";
        
        echo "<nav>
                <ul class=\"pager\">
                  <li class=\"previous\"><a href=\"passwordreset.php\"><span aria-hidden=\"true\">&larr;</span> BACK </a></li>
                  <button class=\"next btn btn-default\" type=\"submit\" name = \"submitting\" id = \"submitting\"> PROCEED <span aria-hidden=\"true\">&rarr;</span></button>                  
                </ul>
              </nav>";
		      
        echo "</form>";
        echo "</div></div>";
        //<button   type=\"submit\" class="btn btn-primary signupbutton" name="submit1" id="submit1" > Submit </button>
        exit;
		//
        
        echo "<a href=\"logout.php\">BACK TO HOMEPAGE</a>";
        } 
    }
  ?>
    
<?php
 
     
		if(isset($_POST['submitting'])){
		 $ans = $_POST['ans'];
		 $result= mysql_query("SELECT * FROM mst_user
              WHERE answer = '$ans'");
    if(mysql_num_rows($result) == 1){
	  $_SESSION[login2]=$ans;
    }  else {
        $message =  "Incorrect Answer, Please try again";
    }  } 
    
	//Displaying The forgotten username
	if (isset($_SESSION[login2]))
{
	while ($row = mysql_fetch_array($result)) {
	 
	
	 $message =  " Your Login Id is => {$row['login']}";
	 }
	}	
	
 ?>


&nbsp </br>
&nbsp </br>
&nbsp </br>
&nbsp </br>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
&nbsp </br>
<h2 style="text-align: center; font-size: 35px;  font-family: matura mt; background: #a3a3a3;color: white; border-radius:20px;">Having trouble signing in?</h2>
&nbsp </br>
&nbsp </br>

<!-- echo that the username was not found -->
<h4 style="text-align: center; color: red;" ><?php echo $message; ?></h4>

<!--PASSWORD-->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title" style="text-align: center;">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          I dont know my Password
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" >
      <div class="panel-body">
        <h4 style="text-align: center;"> To reset your password, enter the Login Id that you use to sign in.</h4> <br />
        
        <form name="form2" method="POST" action="" class="form-horizontal">
				  
			  <div class="form-group">
				<label for="username" class="col-sm-2 control-label"> Login ID </label>
				<div class="input-group col-md-8">                  
				  <input type="text" class="form-control" name="username" id="username" placeholder="User ID" required >
				</div>
                <br />
                <div class="col-sm-offset-1 col-md-10" style="width=100%"; >
				 <h4><button   type="submit" class="btn btn-primary signupbutton" name="submit1" id="submit1" > Submit </button>  </h4>             
             </div>
        </form>
        
      </div>
    </div>
  </div>
	
	<!--USERNAME-->
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title" style="text-align: center;">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          I Dont Know My Username
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        
        <h4 class="col-offset-6" style="padding-bottom:3px; text-align: center;"> Please Input the E.mail Address used during sign-up </h4>
        
        <form name="form1" method="post" action="" class="form-horizontal">
				  
			  
				<div class="form-group">
                <label for="email" class="col-md-offset-1 col-md-3">E-mail Address</label>
                 <div class="input-group col-md-7">
                   <span class="input-group-addon">@</span>
                   <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupSuccess4Status" placeholder="email">
                 </div>
               </div> 
                <br />
                <div class="col-sm-offset-1 col-sm-10">
				  <button type="submit" class="btn btn-primary signupbutton" name="submit2" id="submit2" > Submit</button>
                </div>
        </form>
      </div>
    </div>
  </div>
  
</div>


</div>
<div>
    <nav>
    
        <ul class="pager">
        <li class="previous"><a href="index.php"><span aria-hidden="true">&larr;</span> Back To Homepage</a></li>
        
      </ul>
    </nav>
</div>
    </div>
    
</body>
</html>
<div>
    <!--<form>
    <div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
    I dont know my password
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
    i dont know my Login Id
  </label>
</div>
<div class="radio disabled">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" >
    Having other Problems
  </label>
  <button type="button" data-toggle="modal" data-target="#myModal">Launch modal</button>
-->
</div>
</form>
</body>
</html>