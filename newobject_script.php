<?php

    session_start();
    require_once('scripts/db.php');
    $conn = db();

    $objectname = $_POST['objectname'];
    $price = $_POST['price'];
    $objectdesc = $_POST['objectdesc'];
    $locationid = $_POST['locationid'];
    $_SESSION['insertedobj'] = 0;
    
    #insertion sql
    $sql_unos = 'INSERT INTO `object`
                (`Object_ID`, `Object_name`, `Price`, `Object_desc`, `Location_ID`, `User_ID`) 
                VALUES (NULL, "'.$objectname.'", '.$price.', "'.$objectdesc.'", '.$locationid.', '.$_SESSION['User_ID'].');';

    
    if ($conn->query($sql_unos))
    {
        $_SESSION['insertedobj'] = 1;
        header("Location: host_profile_page.php");
    }
    else
    {
        echo'Something went wrong. Please try again.';
    }

?>