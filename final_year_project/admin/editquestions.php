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
 

<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php

extract($_POST);

echo "<BR>";
if (!isset($_SESSION['loginid']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
echo "<BR><h2 class=\"\" style=\" text-align:center; text-decoration:underline; padding-bottom:15px; \">Edit Examination Questions</h2>";

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
<button class="btn btn-danger" onClick=" return window.confirm('Are You Sure?');" style=" font-size: 18px; height: 33px; vertical-align: middle; " type="submit" name="submit4" id="submit4"> DELETE </button>
 <div style="padding-top: 15px;">
<button style="width: 100%; font-size: 18px; height: 33px; vertical-align: middle; " type="submit" class="btn btn-success" name="submit2" id="submit2">VIEW</button>
    </div>
</form>

<?php if( isset($_POST['submit2']) && strlen($testid)>0 )
{
    $res=mysql_query("select * from mst_question where test_id='$testid'", $cn) or die(mysql_error());
    
//$res=mysql_query("select u.username, t.total_que,r.test_date,r.score from mst_test t, mst_result r, mst_user u
//                 where t.test_id=r.test_id and r.login=u.login and t.test_id='$testid'", $cn) or die(mysql_error());
if (mysql_num_rows($res)==0)
{
	echo "<br><br><br><div class=head1>No Questions to display</div>";
	exit;
}

} ?>
	</div>
</div>
</div>

<!-- to diplay the questions requested -->

 
<div>
    
    &nbsp <br>
    &nbsp <br>
    &nbsp <br>
    &nbsp <br>
<div class="row">
	   <button class="btn btn-success" style="margin: auto;"><a href="editquestions.php">RESET</a></button>
	<div class="col-xs-4 col-xs-offset-4" style="border: 0px solid #e3e3e3; background: #f3f3f3; border-radius:25px; text-align: center;">
		
        &nbsp <br>
        &nbsp <br>
        &nbsp <br>
<form name="form2" method="post">
<?php  while($row=mysql_fetch_row($res)){ ?>
<div class="form-group float-label-control" >
    
    <input type="hidden" id="id" name="id[]" value="<?php echo $row[0];?>" />
    <div class="form-group">
        <label class="control-label"> Question <?php echo $i ;?> </label>
        <div class="#" >
            <input type="text" class="form-control" placeholder="<?php echo $row[2];?>" id="addque" name="addque[]" value="<?php echo $row[2];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label"> Option 1</label>
        <div class= >
            <input type="text" class="form-control" placeholder="<?php echo $row[3];?>" id="ans1" name="ans1[]" value="<?php echo $row[3];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Option 2 </label>
        <div class= >
            <input type="text" class="form-control" placeholder="<?php echo $row[4];?>" id="ans2" name="ans2[]" value="<?php echo $row[4];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label"> Option 3</label>
        <div class= >
            <input type="text" class="form-control" placeholder="<?php echo $row[5];?>" id="ans3" name="ans3[]" value="<?php echo $row[5];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label"> Option 4</label>
        <div class= >
            <input type="text" class="form-control" placeholder="<?php echo $row[6];?>" id="ans4" name="ans4[]" value="<?php echo $row[6];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label"> Correct Option </label>
        <div class= >
            <input type="text" class="form-control" placeholder="<?php echo $row[7];?>" id="anstrue" name="anstrue[]" value="<?php echo $row[7];?>">
        </div>
    </div>
                
                          
      
                              
                </div>
&nbsp </br>
    &nbsp </br>
    &nbsp </br>
    &nbsp </br>
    &nbsp </br>
    
 
<?php } ?>
  <button class="btn btn-primary" type="submit" name="submit8" value="Update"> Update </button>
        </form>
<?php 
  if( isset($_POST['submit8']))
{
	   ?>
	   <div class="col-sm-4 col-sm-offset-4" style="background: #e3e3e3; border-radius: 25px; font-size: 22px; ">
	   <?php
    echo count($_POST['addque']) . " Question(s)";
    for($i = 0 ; $i < count($_POST['addque']); $i++)
    {
            $Rowrunning = mysql_query("UPDATE mst_question SET que_desc='$addque[$i]',ans1='$ans1[$i]',ans2='$ans2[$i]',ans3='$ans3[$i]',
                       ans4='$ans4[$i]',true_ans='$anstrue[$i]' WHERE que_id = '$id[$i]'",$cn) or die(mysql_error());
            
    } if(isset($Rowrunning)){
            echo "<p align=center> Updated Successfully.</p>";
            }
}
?>
<?php if( isset($_POST['submit4']) && strlen($testid)>0 )
{
$prezi =mysql_query(" DELETE FROM mst_question WHERE test_id =$testid ", $cn) or die(mysql_error());
    
//$res=mysql_query("select u.username, t.total_que,r.test_date,r.score from mst_test t, mst_result r, mst_user u
//                 where t.test_id=r.test_id and r.login=u.login and t.test_id='$testid'", $cn) or die(mysql_error());
if (mysql_affected_rows($cn)==0)
{
	echo "<br><br><br><div class=head1>No Questions to delete</div>";
	exit;
}else {
	   echo "<br><br><br><div class=head1>Questions deleted successfully</div>";
}

} ?>
</div>
	   &nbsp </br>
	&nbsp </br>
	</div>
</div>
    
</div>
 
 &nbsp <br>
 &nbsp <br>
 &nbsp <br>
 &nbsp <br>