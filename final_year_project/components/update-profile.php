<?php
    ini_set("display_errors",1);
    session_start();
    $temp=$_SESSION['login'];
    if(isset($_POST)){
        require '../_database/database.php';
        $Destination = '../userfiles/background-images';
        if(!isset($_FILES['BackgroundImageFile']) || !is_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'])){
            $BackgroundNewImageName= 'default-background.jpg';
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['BackgroundImageFile']['name']));
            $ImageType = $_FILES['BackgroundImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $BackgroundNewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        $sql1="UPDATE mst_user SET user_backgroundpicture='$BackgroundNewImageName' WHERE login = '$temp'";
        $sql2="INSERT INTO mst_user (user_backgroundpicture) VALUES ('$BackgroundNewImageName') WHERE login = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM mst_user WHERE login = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['BackgroundImageFile']['name'])){
                mysqli_query($database,$sql1)or die(mysqli_error($database));
                header("location:../edit-profile.php?login=$temp");
            }
        } 
        else {
            mysqli_query($database,$sql2)or die(mysqli_error($database));
            header("location:../edit-profile.php?login=$temp");
        }
        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.png';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE mst_user SET passport='$NewImageName' WHERE login = '$temp'";
        $sql6="INSERT INTO mst_user (passport) VALUES ('$NewImageName') WHERE login = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM mst_user WHERE login = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                mysqli_query($database,$sql5)or die(mysqli_error($database));
                header("location:../edit-profile.php?login=$temp");
            }
        } 
        else {
            mysqli_query($database,$sql6)or die(mysqli_error($database));
            header("location:../edit-profile.php?login=$temp");
        }  
        $user_firstname=$_REQUEST['username'];
        //$user_lastname=$_REQUEST['user_lastname'];
        $user_email=$_REQUEST['email'];
        //$pass=$_REQUEST['pass'];
        //$user_profession=$_REQUEST['user_profession'];
        $user_address=$_REQUEST['address'];
        $security_question=$_REQUEST['security_question'];   
        $answer=$_REQUEST['answer'];
        $answer=md5($answer);
        $dob=$_REQUEST['dob'];
        $user_gender=$_REQUEST['user_gender'];
        $user_country=$_REQUEST['city'];
        $user_website=$_REQUEST['user_website'];
        $user_facebook=$_REQUEST['user_facebook'];
        $user_twitter=$_REQUEST['user_twitter'];
        $user_googleplus=$_REQUEST['user_googleplus'];
        $user_skype=$_REQUEST['user_skype'];
        $user_github=$_REQUEST['user_github'];
        $user_youtube=$_REQUEST['user_youtube'];
        $user_vimeo=$_REQUEST['user_vimeo'];
        $user_pinterest=$_REQUEST['user_pinterest'];
        $sql3="UPDATE mst_user SET username='$user_firstname',address='$user_address',email='$user_email',security_question='$security_question',answer='$answer',dob='$dob',city='$user_country' WHERE login = '$temp'";
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header("location:../edit-profile.php?login=$temp&request=profile-update&status=success");
    }    
?>