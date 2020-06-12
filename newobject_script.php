<?php

    session_start();
    require_once('scripts/db.php');
    $conn = db();

    $objectname = $_POST['objectname'];
    $price = $_POST['price'];
    $locationid = $_POST['locationid'];
    $_SESSION['inserted'] = 0;
    
    #insertion sql
    $sql_unos = 'INSERT INTO `object`
                (`Object_ID`, `Object_name`, `Price`, `Location_ID`, `User_ID`) 
                VALUES (NULL, "'.$objectname.'", '.$price.', '.$locationid.', '.$_SESSION['User_ID'].');';
    echo $sql_unos;

    if ($conn->query($sql_unos))
    {
        $_SESSION['inserted'] = 1;
        header("Location: host_profile_page.php");
    }
    else
    {
        echo'Something went wrong. Try again.';
    }

?>