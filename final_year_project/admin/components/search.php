<?php
    require '../_database/database.php';
    session_start();
    $current_user=$_SESSION['loginid'];
    if($_POST){
        $q=$_POST['searchword'];
        $sql_res=mysqli_query($database,"select * from mst_user where username like '%$q%' order by user_id LIMIT 5");
        //$result=  mysql_query($sql_res) or die(mysql_errno());
        $trws= mysqli_num_rows($sql_res);
        if($trws>0){
            while($row=mysqli_fetch_array($sql_res)){
            $fname=$row['username'];
            //$lname=$row['user_lastname'];
            $user_username=$row['login'];
            //$re_fname='<b>'.$q.'</b>';
            //$re_lname='<b>'.$q.'</b>';
            //$final_fname = str_ireplace($q, $fname);
            //$final_lname = str_ireplace($q, $re_lname, $lname);
?>  
<a href="./profile.php?login=<?php echo $user_username; ?>">    
    <div class="display_box" align="left">
        <i class="fa fa-user"></i>
<?php echo $fname; ?>&nbsp;    
    </div>    
</a>
<?php
            }
        }
        else{
?>        
<div class="display_box" align="left">    
<?php echo "No results to show"; ?>
</div>
<?php   
        }
    }
    else{
    }
?>