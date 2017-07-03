<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['loginid']))
{
	echo "<br><h2>You are not Logged On Please Login to Access this Page</h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
?>

<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="quiz.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");

include("header-after-login-admin.php");



if($_POST[submit]=='Save' || strlen($_POST['subid'])>0 )
{
extract($_POST);
$checking = mysql_query("select * from mst_test where test_name = '$testname' and sub_id = '$subid'", $cn) or die(mysql_error());
if(mysql_num_rows($checking) > 0){
	echo "<h3 align=center style=\"color:white; font-size:20px;\"> Examination <b>\"$testname\"</b> Already Exists. Please Proceed to Adding Questions.</h3>";
} else {
mysql_query("insert into mst_test(sub_id,test_name,total_que,time,examdate,examtime)
			values ('$subid','$testname','$totque','$time','$examdate','$examtime')",$cn) or die(mysql_error());
echo "<h3 align=center style=\"color:white; font-size:20px;\">Examination <b>\"$testname\"</b> Added Successfully.</h3>";
unset($_POST);
}}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Please Enter Test Name");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Please Enter Total Question");
document.form1.totque.value;
return false;
}
return true;
}
</script>
<div class="form-control" style="margin:auto; width:50%; height:650px; padding-top: 20px; box-shadow:2px 1px 2px 2px #CCCCCC;">
	<div class="row">
		<div class="col-xs-7 col-xs-offset-2">
			<br><h2><div class="head1">Add A New Examination</div></h2>
<form name="form1" method="post" onSubmit="return check();">
<div class="form-group">
<label for="subid" >Select Subject</label>  
      
<select name="subid" class="form-control">
<?php
$rs=mysql_query("Select * from mst_subject order by  sub_name",$cn);
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$subid)
{
echo "<option value='$row[0]' selected>$row[1]</option>";
}
else
{
echo "<option value='$row[0]'>$row[1]</option>";
}
}
?>
</select>
		</div>
	
  <div class="form-group">
    <label for="testname">Enter Examination Name</label>
    <input type="text" class="form-control" id="testname" name="testname" placeholder="Test Name">
  </div>
  <div class="form-group">
    <label for="totque">Enter No Of Questions</label>
    <input type="text" class="form-control" id="totque" name="totque" placeholder="1,2,3,...">
  </div>
  <div class="form-group">
    <label for="time">Time Limit (Mins)</label>
    <select class="form-control" style="width:40%" name="time" id="time">
	    <option selected="selected">--Time--</option>
		
		<option value="5">5</option>
		<option value="10">10</option>
		<option value="20">20</option>
		<option value="30">30</option>
		<option value="40">40</option>
		<option value="50">50</option>
		<option value="60">60</option>
		<option value="90">90</option>
		<option value="120">120</option>
		
		
	</select>
  </div>
 <!-- <div class="form-group" style="display: block;">
	<label for="startdate">Exam date and time</label>
	<input class="form-control" style=" width: 50%;" name="startdate" id="startdate" type="date"/>
	<input class="form-control" style=" width: 50%;" name="starttime" id="starttime" type="time"/>
  </div>-->
	
	
	
	
      <button type="submit" style="width: 100%;" class="btn btn-primary" name="submit">Add</button>
    
</form>

		</div>
	</div>
</div>
<p>&nbsp; </p>
