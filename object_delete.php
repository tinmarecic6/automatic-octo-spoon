<?php
    session_start();
    require_once('scripts/db.php');
    $conn = db();

    $deleteobject = 'DELETE FROM `object` WHERE Object_ID = "'.$_GET['objid'].'";';
    if($conn->query($deleteobject))
    {
        $_SESSION['deletedobject'] = 1;
        header("Location: host_profile_page.php");
    }
?>