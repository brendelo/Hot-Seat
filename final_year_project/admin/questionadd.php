<?php
session_start();
require("../database.php");
include("header-after-login-admin.php");
error_reporting(1);
?>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
extract($_POST);

echo "<BR>";
if (!isset($_SESSION[loginid]))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center style=\"color : white;\">Click Here for Login</h3></a>";
	exit();
}

echo "<BR><h3 class=head1>Add Question </h3>";
if($_POST[submit]=='Save' || strlen($_POST['testid'])>0 )
{
extract($_POST);
mysql_query("insert into mst_question(test_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')",$cn) or die(mysql_error());
echo "<p align=center style=\"color : blue; font-size: 20px;\">Question Added Successfully.</p>";
unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.addque.value;
if (mt.length<1) {
alert("Please Enter Question");
document.form1.addque.focus();
return false;
}
a1=document.form1.ans1.value;
if(a1.length<1) {
alert("Please Enter Answer1");
document.form1.ans1.focus();
return false;
}
a2=document.form1.ans2.value;
if(a1.length<1) {
alert("Please Enter Answer2");
document.form1.ans2.focus();
return false;
}
a3=document.form1.ans3.value;
if(a3.length<1) {
alert("Please Enter Answer3");
document.form1.ans3.focus();
return false;
}
a4=document.form1.ans4.value;
if(a4.length<1) {
alert("Please Enter Answer4");
document.form1.ans4.focus();
return false;
}
at=document.form1.anstrue.value;
if(at.length<1) {
alert("Please Enter Correct Answer");
document.form1.anstrue.focus();
return false;
}
return true;
}
</script>

<div style="margin:auto; width:80%; height:auto; box-shadow:2px 1px 2px 2px #CCCCCC; background:#b3b3b3;  text-align:left">
	<div class="col-sm-4">
	<form  class="form-horizontal" name="form1" method="post" > <!-- form for the course search-->


  
    <div>
      	
            <label for="course" style = "font-size:20px; text-align: center; padding-bottom: 15px;" class="control-label">Select Subject</label>

        <select name="course" class="form-control" width="50px;">
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
	</div>
	
<form name="form1" method="post" onSubmit="return check();">
  <table width="80%"  border="1" align="center" class="table">
	
    <tr>
      <td width="24%" height="32"><div align="left"><strong>Select Test Name </strong></div></td>
      <td width="1%" height="5">  
      <td width="75%" height="32"><select name="testid" id="testid" class="form-control" style="width: 100%">
<?php
//
 if($submit1=='submit1' || strlen($course)>0 )
{
    $idnum = $row[0];
$ts=mysql_query("select * from mst_test where sub_id ='$course'");
if (mysql_num_rows($ts)==0)
{
	echo "<br><br><br><div class=head1>No Examination For This Course</div>";
	exit;
}

}
//
$rs=mysql_query("Select * from mst_test where sub_id ='$course' order by test_name",$cn);
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$testid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Enter Question </strong></div></td>
        <td>&nbsp;</td>
	    <td><textarea name="addque" class="form-control" style="width: 100%;" id="addque"></textarea></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Enter Answer1 </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="ans1" class="form-control" type="text" id="ans1" style="width: 100%;"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer2 </strong></td>
      <td>&nbsp;</td>
      <td><input name="ans2" class="form-control" type="text" id="ans2" style="width: 100%;"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer3 </strong></td>
      <td>&nbsp;</td>
      <td><input name="ans3" class="form-control" type="text" id="ans3" style="width: 100%;"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer4</strong></td>
      <td>&nbsp;</td>
      <td><input name="ans4" class="form-control" type="text" id="ans4" style="width: 100%;"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter True Answer </strong></td>
      <td>&nbsp;</td>
      <td><input name="anstrue" class="form-control" type="text" id="anstrue" style="width: 100%;"></td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-primary"  style="width: 100%;" name="submit" value="ADD QUESTION" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</div>