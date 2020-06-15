<?php
    session_start();
    require_once('scripts/db.php');
    $conn = db();

    $deleteuser = 'DELETE FROM `user` WHERE User_ID = '.$_GET['userid'].';';
    if($conn->query($deleteuser))
    {
        $_SESSION['deleted'] = 1;
        header("Location: admin_profile_page.php");
    }
    
    $deleteobject = 'DELETE FROM `object` WHERE Object_ID = '.$_GET['objid'].';';
    if($conn->query($deleteobject))
    {
        $_SESSION['deleted'] = 1;
        header("Location: admin_profile_page.php");
    }
    
    $deleteres = 'DELETE FROM `reservation` WHERE Reservation_ID = '.$_GET['resid'].';';
    if($conn->query($deleteres))
    {
        $_SESSION['deleted'] = 1;
        header("Location: admin_profile_page.php");
    }
?>