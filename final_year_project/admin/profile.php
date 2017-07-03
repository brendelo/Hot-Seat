<?php include 'components/authentication.php' ?> 
<?php include 'components/session-check-profile.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'header-profile-admin.php' ?> 
<?php include 'controllers/base/style.php' ?>
<?php 
    if($_GET["follow"]=="same"){
        $dialogue="Your can't follow yourself! ";
    }
?>
    <script>
        $.growl("<?php echo $dialogue; ?> ", {
            animate: {
                enter: 'animated zoomInDown',
                exit: 'animated zoomOutUp'
            }								
        });
    </script>
<?php 
    session_start();
    $current_user = $_SESSION['username'];
    $user_username = mysqli_real_escape_string($database,$_REQUEST['username']);
    $profile_username=$rws['username'];
?>
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>
<div class="profile">
	<div class="row clearfix">
		<!-- <div class="col-md-12 column"> -->
            <div>
                <center>
                    <img src="../userfiles/avatars/<?php echo $rws['passport'];?>" class="img-responsive profile-avatar">
                </center>
                <h1 class="text-center profile-text profile-name"><?php echo $rws['username'];?> </h1>
                <h2 class="text-center profile-text profile-profession"> Candidate Number : <?php echo $rws['user_id'];?></h2>
				<h4 class="text-center profile-text profile-name"><a href="result.php?login=<?php echo $rws['login'];?>&&username=<?php echo $rws['username'];?>"> View Result </a></h4>
                <br>
                <div class="panel-group white" id="panel-profile">
                    <div class="panel panel-default">
                        <div id="panel-element-info" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="col-md-8 column">
                                    <p class="text-center profile-title"><i class="fa fa-info"></i> Basic</p>
                                    <hr>
<?php
    if ($rws['user_shortbio']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-info"></i> Bio</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['user_shortbio'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['address']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-info"></i> Location</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['address'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['email']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-envelope"></i> Email</p>
                                    </div>
                                    <div class="col-md-8">                                    
                                        <p><?php echo $rws['email'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['city']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-info"></i> Country</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['city'];?></p>
                                    </div>
<?php } ?>
                                </div>
                                <div class="col-md-4 column">
                                    <p class="text-center profile-title"><i class="fa fa-info"></i> Personal</p>
                                    <hr>
<?php
    if ($rws['user_gender']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-user"></i> Gender</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['user_gender'];?></p>
                                    </div>
<?php } ?>
<?php
    if ($rws['dob']){
?>   
                                    <div class="col-md-4">
                                        <p class="profile-details"><i class="fa fa-calendar"></i> Date of Birth</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p><?php echo $rws['dob'];?></p>
                                    </div>
<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<!-- </div> -->
	</div>
</div>