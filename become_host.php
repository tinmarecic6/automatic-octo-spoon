<?php 
    require_once('scripts/db.php');
    $conn = db();
    session_start();
    $userID = $_SESSION['User_ID'];
    $sql_become_host = 'UPDATE `user` SET `Type_ID`=2 where User_ID = '.$userID.';';
    $conn->query($sql_become_host);
    $_SESSION['Type_ID'] = "2";
    header('Location: host_profile_page.php');
?>