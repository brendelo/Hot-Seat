
<html>
<head>
<title>Candidate signup </title>
<?php include 'components/session-check-index.php' ?>
<?php require '_database/database.php'; ?>


<script language="javascript">
function check()
{

 if(document.form1.lid.value=="")
  {
    alert("Plese Enter Login Id");
	document.form1.lid.focus();
	return false;
  }
 
 if(document.form1.pass.value=="")
  {
    alert("Plese Enter Your Password");
	document.form1.pass.focus();
	return false;
  } 
  if(document.form1.cpass.value=="")
  {
    alert("Plese Enter Confirm Password");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.pass.value!=document.form1.cpass.value)
  {
    alert("Confirm Password does not matched");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.name.value=="")
  {
    alert("Plese Enter Your Name");
	document.form1.name.focus();
	return false;
  }
  if(document.form1.address.value=="")
  {
    alert("Plese Enter Address");
	document.form1.address.focus();
	return false;
  }
  if(document.form1.city.value=="")
  {
    alert("Plese Enter City Name");
	document.form1.city.focus();
	return false;
  }
  if(document.form1.phone.value=="")
  {
    alert("Plese Enter Contact No");
	document.form1.phone.focus();
	return false;
  }
  if(document.form1.email.value=="")
  {
    alert("Plese Enter your Email Address");
	document.form1.email.focus();
	return false;
  }
  e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.form1.email.focus();
			return false;
		}
  return true;
  }
  
</script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">


<link rel="stylesheet" href="template/css/bootstrap.min.css">
		<link rel="stylesheet" href="template/css/animate.min.css">
		<link rel="stylesheet" href="template/css/font-awesome.min.css">
		<link rel="stylesheet" href="template/css/owl.theme.css">
		<link rel="stylesheet" href="template/css/owl.carousel.css">
		<!--<link rel="stylesheet" href="template/css/style.css">-->
		<link href="quiz.css" rel="stylesheet" 	type="text/css">
		
		

</head>

<body>
<?php
include("header.php");


?>

   &nbsp </br>
   &nbsp </br>
   &nbsp </br>
   &nbsp </br>
   &nbsp </br>
   &nbsp </br>
   &nbsp </br>
<h3 align="center" style="font-family: Avant Garde;"><a href="index.php">Click here to go back to the Login page</a></h3>
<h1 align="center" style="font-family: Garamond;">New Candidate SignUp</h1>

   
   <div class="row">
	
  <div class="col-sm-4 col-sm-offset-4" style="background: #e3e3e3; border-radius:30px; ">
   <div class="col-sm-10 col-sm-offset-1" >
<form name="form1" method="post" action="signupuser.php" class="form-horizontal" onSubmit="return check();">
	&nbsp </br>
	  <div class="form-group">
		<label for="lid">Login ID</label>
		<input type="text" class="form-control" id="lid" name="lid" placeholder="Username">
	  </div>
	  <div class="form-group">
		<label for="pass">Password</label>
		<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
	  </div>
	  <div class="form-group">
		<label for="cpass">Confirm Password</label>
		<input type="password" class="form-control" id="cpass" name="cpass" placeholder="Password">
	  </div>
	  <div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
	  </div>
	  <div class="form-group">
		<label for="dob">Date Of Birth</label>
		<input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
	  </div>
	  <div class="form-group">
		<label for="address">Address</label>
		<textarea type="text" class="form-control" id="addresss" name="address" placeholder="Address"></textarea>
	  </div>
	  <div class="form-group">
		<label for="city">City</label>
		<input type="text" class="form-control" id="city" name="city" placeholder="City">
	  </div>
	  <div class="form-group">
		<label for="phone">Telephone Number</label>
		<input type="tel" class="form-control" id="phone" name="phone" placeholder="Telephone">
	  </div>  
	  <div class="form-group">
	   <label for="email">E-mail Address</label>
		<div class="input-group">
		  <span class="input-group-addon">@</span>
		  <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupSuccess4Status">
		</div>
	  </div> 
	  
	  <!--<div class="form-group">
		<label for="passport">Passport Photograph</label>
		<input type="file" id="passport" name="passport">
		   <div class="col-md-6">
				  <div class="shortpreview">
					  <label for="">Previous Avatar </label
					  <br> 
					  <img src="userfiles/avatars/<?php echo $rws['passport'];?>" class="img-responsive">
				  </div>
			</div>
			<div class="col-md-6">
                  <div class="shortpreview" id="uploadImagePreview">
                     <label for="">Current Uploaded Passport </label>
                     <br> 
                     <div id="imagePreview"></div>
                  </div>
            </div>
	  </div>-->
	 
	  <!--security for password recovery-->
	  <div style="margin-top: 3em; border-top: 4px solid #000000;">
	  
	   <h4>Please Fill the fields below</h4>
	  
	  <div class="form-group">
		<label for="question">Security Question</label>
		<textarea type="text" class="form-control" id="question" name="question" placeholder="Input Security Question Here"></textarea>
	  </div>
	  <div class="form-group">
		<label for="answer">Answer (one-word)</label>
		<textarea type="text" class="form-control" id="answer" name="answer" placeholder="Answer to Security Question"></textarea>
	  </div>
	 
	  <!--security ends-->
	  &nbsp</br>
	  &nbsp</br>
	  <div style="margin-top: 1em; margin-bottom: 3em;">
		<button type="submit" name="submit" class="btn btn-success signupbutton">Sign Up</button>
      </div>
	  </div>
</form>
  
  
</div>
   &nbsp</br>
   &nbsp</br>
   &nbsp</br>
   &nbsp</br>
   
</body>
</html>
