<?php

    session_start();
    require_once('scripts/db.php');
    $conn = db();

    $datefrom = $_POST['datefrom'];
    $dateto = $_POST['dateto'];
    $_SESSION['insertedres'] = 0;
    var_dump($_POST);
    #insertion sql
    $sql_unos = 'INSERT INTO `reservation`
                (`Reservation_ID`, `Date_from`, `Date_to`, `Status`, `Confirmed`, `Object_ID`, `User_ID`)
                VALUES (NULL, "'.$datefrom.'", "'.$dateto.'", 1 , 0, '.$_POST['Object_ID'].', '.$_SESSION['User_ID'].');';
    /* echo $sql_unos; */

    if ($conn->query($sql_unos))
    {
        $_SESSION['insertedres'] = 1;
        header("Location: homepage.php");
    }
    else
    {
        echo'Something went wrong. Please try again.';
    }

?>