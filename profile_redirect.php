<?php

    require_once('scripts/db.php');
    $conn = db();

    session_start();

    switch($_SESSION['Type_ID']){
        case 2: header("Location: host_profile_page.php");break;
        case 3: header("Location: user_profile_page.php");break;
        default : header("Location: homepage.php");break;
    }

?>