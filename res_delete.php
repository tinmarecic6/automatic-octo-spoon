<?php
    session_start();
    require_once('scripts/db.php');
    $conn = db();

    $deleteres = 'DELETE FROM `reservation` WHERE Reservation_ID = '.$_GET['resid'].';';
    if($conn->query($deleteres))
    {
        $_SESSION['deleted'] = 1;
        header("Location: profile_redirect.php");
    }
?>