<?php

    session_start();
    require_once('scripts/db.php');
    $conn = db();

    $reservation = $_POST['reservation'];
    $res = explode(' - ',$reservation);
    $datefrom = strtotime($res[0]);
    $date_from_conv = date('Y-m-d',$datefrom);
    $dateto = strtotime($res[1]);
    $date_to_conv = date('Y-m-d',$dateto);
    $_SESSION['insertedres'] = 0;
    var_dump($_POST);
    #insertion sql
    $sql_unos = 'INSERT INTO `reservation`
                (`Reservation_ID`, `Date_from`, `Date_to`, `Status`, `Confirmed`, `Object_ID`, `User_ID`)
                VALUES (NULL, "'.$date_from_conv.'", "'.$date_to_conv.'", 1 , 0, '.$_POST['Object_ID'].', '.$_SESSION['User_ID'].');';
    echo $sql_unos; 
    
      if ($conn->query($sql_unos))
    {
        $_SESSION['insertedres'] = 1;
        header("Location: profile_redirect.php");
    }
    else
    {
        echo'Something went wrong. Please try again.';
    }

?>