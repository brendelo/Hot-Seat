<?php include 'components/authentication.php' ?>     


<?php include 'header-profile-admin.php' ?>     
<?php 
    if($_GET["request"]=="profile-update" && $_GET["status"]=="success"){
        $dialogue="Your profile update was successful! ";
    }
    else if($_GET["request"]=="profile-update" && $_GET["status"]=="unsuccess"){
        $dialogue="Your profile update was NOT successful! ";
    }
    else if($_GET["request"]=="loginid" && $_GET["status"]=="success"){
        $dialogue="Welcome back again! ";
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
    &nbsp </br>
    &nbsp </br>
    &nbsp </br>
    &nbsp </br>
    
<div class="container" style="border: solid; background: #e3e3e3; border-radius: 25px; opacity: 0.9;">
    <div class="row clearfix">
        <div class="col-xs-12">
            <h1 class="text-center" style="text-decoration: underline; font-size: 40px;">Welcome to your profile</h1>
        </div>
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
            <ul class="nav text-center" >
                &nbsp </br>
                <li><a href="my-profile.php" style="font-size:22px;">View Admin Profile</a></li>
                &nbsp </br>
                <li><a href="edit-profile.php" style="font-size:22px;">Edit profile</a></li>
                &nbsp </br>
                <li><a href="all-users.php" style="font-size:22px;">View all Candidates</a></li>
                &nbsp </br>
                <li><a href="components/logout.php" style="font-size:22px;">Logout</a></li>
                &nbsp </br>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="col-xs-4"></div>
    </div>
</div>