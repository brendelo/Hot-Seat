<?php
session_start();
require("../database.php");
include("header-after-login-admin.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<?php

extract($_POST);

echo "<BR>";
if (!isset($_SESSION['loginid']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
echo "<BR><h3 class=head1>Add New Subject/Course </h3>";

echo "<table width=100%>";
echo "<tr><td align=center></table>";
if($submit=='submit' || strlen($subname)>0 )
{
$rs=mysql_query("select * from mst_subject where sub_name='$subname'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Subject Already Exists</div>";
	exit;
}
mysql_query("insert into mst_subject(sub_name) values ('$subname')",$cn) or die(mysql_error());
echo "<p align=center>Subject  <b> \"$subname \"</b> Added Successfully.</p>";
$submit="";
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.subname.value;
if (mt.length<1) {
alert("Please Enter Subject Name");
document.form1.subname.focus();
return false;
}
return true;
}
</script>

<div style="margin:auto; width:50%; height:250px; padding-top: 50px; box-shadow:2px 1px 2px 2px #CCCCCC; background: #f3f3f3; border-shadow:25px;">
<title>Add Subject</title>
<div class="row">
	<div class="col-md-6 col-md-offset-3">		
<form  class="form-horizontal" name="form1" method="post" onSubmit="return check();">

<div class="form-group">
    
    <div>
      <label for="subname" style = "font-size:20px; text-align: center;" class="control-label">Enter Subject Name</label>
	  <input type="text" class="form-control" name="subname" id="subname" placeholder="Subject Name">
    </div>
  </div>

  <div class="form-group" style="padding-top: 10px;">
    <div>
      <button style="width: 100%; font-size: 18px" type="submit" class="btn btn-success" name="submit">Add Subject</button>
    </div>
  </div>  
    
</form>
	</div>
</div>
</div>