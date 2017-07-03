<?php
    if (isset($_GET['login'])) {
        $user_username = $_GET['login'];
    }
    $sql = "SELECT * FROM mst_user where login='$user_username'";
    $result = mysqli_query($database,$sql) or die(mysqli_error()); 
    $rws = mysqli_fetch_array($result);       
?>
<?php
    if ($rws['user_backgroundpicture']){?>
        <style>
            body{
                background: linear-gradient( rgba(44, 38, 38, 0.45), rgba(0, 0, 0, 0.45) ), url("./userfiles/background-images/<?php echo $rws['user_backgroundpicture']; ?>")!important;
                background-repeat: no-repeat !important;
                background-attachment: fixed !important;
                background-size: cover !important;
                margin-top: 0px;
                display: block;
            }
        </style>
<?php } else {?>
        <style> 
            body{
                background-image:none;
            }
        </style>
<?php }?>
