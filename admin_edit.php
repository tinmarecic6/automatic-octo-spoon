<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    require_once('scripts/db.php');
    $conn = db();

/* USERI */

    $userid = $_GET['userid'];   
    if(isset($_POST['username']) && $_POST['username']!= ''){
        $sql_update_username = 'UPDATE `user` SET `Username`="'.$_POST['username'].'" WHERE `User_ID` = '.$userid.';';
        echo $sql_update_username;
        $sql_update_username='';
        echo 'izvrsavam query';
    };
    if(isset($_POST['first_name']) && $_POST['first_name']!= ''){
        $sql_update_first_name = 'UPDATE `user` SET `First_name`="'.$_POST['first_name'].'" WHERE `User_ID` = '.$userid.';';
        echo $sql_update_first_name;
        $sql_update_first_name='';
        echo 'izvrsavam query';
    };
    if(isset($_POST['last_name']) && $_POST['last_name']!= ''){
        $sql_update_last_name = 'UPDATE `user` SET `Last_name`="'.$_POST['last_name'].'" WHERE `User_ID` = '.$userid.';';
        echo $sql_update_last_name;
        $sql_update_last_name='';
        echo 'izvrsavam query';
    };
    if(isset($_POST['user_image']) && $_POST['user_image']!= ''){
        $sql_update_user_image = 'UPDATE `user` SET `User_image`="'.$_POST['user_image'].'" WHERE `User_ID` = '.$userid.';';
        echo $sql_update_user_image;
        $sql_update_user_image='';
        echo 'izvrsavam query';
    };
    if(isset($_POST['type_id']) && $_POST['type_id']!= ''){
        $sql_update_type_id = 'UPDATE `user` SET `Type_id`="'.$_POST['type_id'].'" WHERE `User_ID` = '.$userid.';';
        echo $sql_update_type_id;
        $sql_update_type_id='';
        echo 'izvrsavam query';
    };
    if(isset($_POST['dob']) && $_POST['dob']!= ''){
        $sql_update_dob = 'UPDATE `user` SET `Date_of_birth`="'.$_POST['dob'].'" WHERE `User_ID` = '.$userid.';';
        echo $sql_update_dob;
        $sql_update_dob='';
        echo 'izvrsavam query';
    };
    if(isset($_POST['password']) && $_POST['password']!= ''){
        $sql_update_password = 'UPDATE `user` SET `Password`="'.$_POST['password'].'" WHERE `User_ID` = '.$userid.';';
        echo $sql_update_password;
        $sql_update_password='';
        echo 'izvrsavam query';
    };

/* OBJEKTI */

    $objid = $_GET['objid'];   
if(isset($_POST['object_name']) && $_POST['object_name']!= ''){
    $sql_update_object_name = 'UPDATE `object` SET `Object_name`="'.$_POST['object_name'].'" WHERE `Object_ID` = '.$objid.';';
    echo $sql_update_object_name;
    $sql_update_object_name='';
    echo 'izvrsavam query';
};
if(isset($_POST['price']) && $_POST['price']!= ''){
    $sql_update_price = 'UPDATE `object` SET `Price`="'.$_POST['price'].'" WHERE `Object_ID` = '.$objid.';';
    echo $sql_update_price;
    $sql_update_price='';
    echo 'izvrsavam query';
};

/* REZERVACIJE */

$resid = $_GET['resid'];   
if(isset($_POST['date_from']) && $_POST['date_from']!= ''){
    $sql_update_date_from = 'UPDATE `reservation` SET `Date_from`="'.$_POST['date_from'].'" WHERE `Reservation_ID` = '.$resid.';';
    echo $sql_update_date_from;
    $sql_update_date_from='';
    echo 'izvrsavam query';
};
if(isset($_POST['date_to']) && $_POST['date_to']!= ''){
    $sql_update_date_to = 'UPDATE `reservation` SET `Date_to`="'.$_POST['date_to'].'" WHERE `Reservation_ID` = '.$resid.';';
    echo $sql_update_date_to;
    $sql_update_date_to='';
    echo 'izvrsavam query';
};
if(isset($_POST['status']) && $_POST['status']!= ''){
    $sql_update_status = 'UPDATE `reservation` SET `Status`="'.$_POST['status'].'" WHERE `Reservation_ID` = '.$resid.';';
    echo $sql_update_status;
    $sql_update_status='';
    echo 'izvrsavam query';
};
if(isset($_POST['confirmed']) && $_POST['confirmed']!= ''){
    $sql_update_confirmed = 'UPDATE `reservation` SET `Confirmed`="'.$_POST['confirmed'].'" WHERE `Reservation_ID` = '.$resid.';';
    echo $sql_update_confirmed;
    $sql_update_confirmed='';
    echo 'izvrsavam query';
};

?>
</head>
<body>
    <form name="edituser" method="post" action="?userid=<?php echo $resid?>">
    Change user info:<br><br>
    Username: <input type="text" name="username"><br>
    First name: <input type="text" name="first_name"><br>
    Last name: <input type="text" name="last_name"><br>
    User image: <input type="text" name="confirmed"><br><br>
    Type id: <input type="radio"
    Date of birth:
    Password:
    <input type="submit" value="UPDATE">
    </form>


    <form name="editres" method="post" action="?resid=<?php echo $resid?>">
    Change reservation:<br><br>
    Date from: <input type="date" name="date_from"><br>
    Date to: <input type="date" name="date_to"><br>
    Status: <input type="checkbox" name="status"><br>
    Confirmed: <input type="checkbox" name="confirmed"><br><br>
    <input type="submit" value="UPDATE">
    </form>
</body>
</html>
