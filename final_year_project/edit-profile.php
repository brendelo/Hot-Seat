<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'header-after-login.php' ?>          
    <div class="container">
	   <div class="no-gutter row"> 
           <div class="col-md-12">
               <div class="panel panel-default" id="sidebar">
                   <div class="panel-body">                
<?php          
    $sql = "SELECT * FROM mst_user where login='$user_username'";
    $result = mysqli_query($database,$sql) or die(mysqli_error($database)); 
    $rws = mysqli_fetch_array($result);
?>             
<?php include 'controllers/form/edit-profile-form.php' ?>

                   </div>
               </div>
			   <nav>
  <ul class="pager">
    <li class="previous"><a href="profilehome.php"><span aria-hidden="true">&larr;</span> Back</a></li>
    <!--<li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>-->
  </ul>
</nav>
           </div>
        </div>
    </div>