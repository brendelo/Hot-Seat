<?php
session_start();
require("../database.php");
include("header-after-login-admin.php");
error_reporting(1);
?>
<?php include 'components/authentication.php' ?>

 <script>
        $.growl("<?php echo $dialogue; ?> ", {
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            }								
        });
    </script>
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
echo "<BR><h2 class=\"\" style=\" text-align:center; text-decoration:underline; padding-bottom:15px; \">Results</h2>";

echo "<table width=100%>";
echo "<tr><td align=center></table>";

?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.course.value;
if (mt.length<1) {
alert("Please select a course!!!");
document.form1.course.focus();
return false;
}
return true;
}
</script>

<div style="margin:auto; width:50%; padding-top: 50px; padding-bottom: 75px; box-shadow:2px 1px 2px 2px #CCCCCC; background: #e3e3e3; border-radius: 25px; border: 15px groove;" >
<title>Add Subject</title>
<div class="row">
	<div class="col-xs-8 col-xs-offset-2" style="background: transparent;">		
<form  class="form-horizontal" name="form1" method="post" onSubmit="return check();"> <!-- form for the course search-->


  
    <div>
      	
            <label for="course" style = "font-size:20px; text-align: center; padding-bottom: 15px;" class="control-label">Select Subject</label>

        <select name="course" class="form-control">
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
    <div style="padding-top: 15px;">
         <button style="width: 100%; font-size: 18px; height: 33px; vertical-align: middle; " type="submit" class="btn btn-primary" name="submit1">GO!!!</button>
    </div>
  
  
    
</form>

<?php if($submit1=='submit1' || strlen($course)>0 )
{
    $idnum = $row[0];
$ts=mysql_query("select * from mst_test where sub_id ='$course'");
if (mysql_num_rows($ts)==0)
{
	echo "<br><br><br><div class=head1>No Examination For This Course</div>";
	exit;
}

} ?>

<form style="padding-top: 25px;" class="form-horizontal" name="form1" method="post" onSubmit="return check();"> <!--form for select specific exam-->

 <label for="testid" style = "font-size:20px; text-align: center; padding-bottom: 15px;" class="control-label">Select Examination</label>
<select name="testid" class="form-control" id="testid">
<?php
	  while($row1=mysql_fetch_array($ts))
{
if($row1[0]==$testid)
{
echo "<option value='$row1[0]' selected>$row1[2]</option>";
}
else
{
echo "<option value='$row1[0]'>$row1[2]</option>";
}
}
?>
      </select>
 <div style="padding-top: 15px;">
         <button style="width: 100%; font-size: 18px; height: 33px; vertical-align: middle; " type="submit" class="btn btn-success" name="submit2" id="submit2">VIEW</button>
    </div>
</form>

<?php if( $POST['submit2'] || strlen($testid)>0 )
{
$res=mysql_query("select u.username, t.total_que,r.test_date,r.score from mst_test t, mst_result r, mst_user u
                 where t.test_id=r.test_id and r.login=u.login and t.test_id='$testid'", $cn) or die(mysql_error());
if (mysql_num_rows($res)==0)
{
	echo "<br><br><br><div class=head1>No Results to display</div>";
	exit;
}

} ?>
	</div>
</div>
</div>

<!-- to diplay the result chosen -->
<div>
    
    &nbsp <br>
    &nbsp <br>
    &nbsp <br>
    &nbsp <br>
<div class="row">
	<div class="col-xs-10 col-xs-offset-1" style="border: 0px solid #e3e3e3; background: transparent; border-radius:20px; text-align: center;">
		<a href="results_admin.php">Back</a>

<?php
echo "<table style=\"border:solid; border-radius: 20px; color:#c3c3c3; \" class=\"table table-bordered table-hover\" align=center>
<tr class=\"style2 danger\" style=\" line-height: 1.5;\"><td align=center width=400> Candidate's Name <td align=center width=210> Total Marks <td align=center> Score<td align=center> Time of Examination";
while($row=mysql_fetch_row($res))
{
echo "<tr class=style8><td align=center class=success>$row[0] <td align=center class=active>$row[1] <td align=center class=warning> $row[3] / $row[1] <td align=center class=info> $row[2]";
}
echo "</table>";
?>

	</div>
</div>
    
</div>