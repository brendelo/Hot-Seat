<?php
session_start()
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>Administrative Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">

</head>

<body style=" background: url('../assets/img/backgrounds/big/server.jpg');">
  
<?php
include("header.php");
?>


 
<div class= "row">
  <div class= "col-xs-4 col-xs-offset-4" style="border: 0px solid; background: white; opacity: 1; border-radius:25px;">
    <h1 align=center><strong>Administrative Login</strong></h1>
    <div> &nbsp </br>
  &nbsp </br>  
  </div>
<form name="form1" method="post" action="login.php" class="form-horizontal" >

  <div class="form-group" style="opacity: 1;">
        <label for="loginid" class="col-sm-2 control-label">Login ID</label>
      <div class="col-xs-10">
        <input class="form-control" name="loginid" type="text" id="loginid" placeholder="Admin ID">
      </div>
  </div>
  <div class="form-group">
      <label for="pass" class="col-sm-2 control-label">Password</label>
    <div class="col-xs-10">
      <input class="form-control" name="pass" type="password" id="pass" placeholder="Password"></td>
    </div>
  </div>
  
   <div>
    &nbsp </br>
    &nbsp </br>
   </div>

  <div class="form-group">
    <div class=" col-xs-12"> 
      <button class="btn btn-primary signupbutton" name="submit" type="submit" id="submit" value="Login">Login</button>
    </div>
    
   
    
 </div>
</form>
</div>
</div>

</body>
</html>
