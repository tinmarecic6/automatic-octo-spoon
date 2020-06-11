<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/user_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Edit info</title>
  </head>

  <!--user type test-->
  <?php 
    require_once('scripts/db.php');
    $conn = db();
    session_start();
    if($_SESSION['Type_ID']=='1' ){
      #Do nothing, display admin page
    }
    else {
      #user is not admin, return to homepage
      header("Location: homepage.php");
    }

/* USERI */
    if(isset($_GET['userid']) && $_GET['userid']!='' ){
        $userid = $_GET['userid'];
    }
/*Cisto da znas tino, POST hvata sva polja iz form tagova po name-u ne po id-u(podsjetnik) */
    if(isset($_POST['username']) && $_POST['username']!= ''){
        $sql_update_username = 'UPDATE `user` SET `Username`="'.$_POST['username'].'" WHERE `User_ID` = '.$userid.';';
        echo $sql_update_username;
        $sql_update_username='';
        echo 'izvrsavam query';
    };
    if(isset($_POST['firstname']) && $_POST['firstname']!= ''){
        $sql_update_first_name = 'UPDATE `user` SET `First_name`="'.$_POST['firstname'].'" WHERE `User_ID` = '.$userid.';';
        echo $sql_update_first_name;
        $sql_update_first_name='';
        echo 'izvrsavam query';
    };
    if(isset($_POST['lastname']) && $_POST['lastname']!= ''){
        $sql_update_last_name = 'UPDATE `user` SET `Last_name`="'.$_POST['lastname'].'" WHERE `User_ID` = '.$userid.';';
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
    if(isset($_POST['typeid']) && $_POST['typeid']!= ''){
        $sql_update_type_id = 'UPDATE `user` SET `Type_id`="'.$_POST['typeid'].'" WHERE `User_ID` = '.$userid.';';
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
    if(isset($_GET['objid']) && $_GET['objid']!='' ){
        $objid = $_GET['objid'];   
    }
    var_dump($objid);
    if(isset($_POST['object_name']) && $_POST['object_name']!= ''){
        $sql_update_object_name = 'UPDATE `object` SET `Object_name`="'.$_POST['object_name'].'" WHERE `Object_ID` = '.$objid.';';
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
if(isset($_GET['resid']) && $_GET['resid']!='' ){
$resid = $_GET['resid'];
}
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

<!--User info edit-->
    <?php if(isset($_GET['userid'])): ?>
<<<<<<< HEAD
         <form class="container mt-5 pt-4" name="edituser" method="POST" action="?userid=<?php echo $userid;?>">
                <h3>Change user info:</h3><br>
=======
         <form class="container mt-5 pt-4" name="edituser" method="POST" action="?userid='.$userid.'">
                <h3 mb-4>Change user info:</h3>
>>>>>>> 34b9b718fa26d9db93cac2a966c12a4486c824a4
                <div class="row">
                    <div class="col form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="col form-group">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name">
                    </div>
                    <div class="col form-group">
                        <input type="text" class="form-control" id="lastname" name="lastname"placeholder="Last name">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="col">
                            <label for="typeid">Type ID:</label>
                            <select class="col form-control" id="typeid" name="typeid" placeholder="Type ID">';
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="userimage">User image:</label>
                        <input type="file" class="form-control-file" id="userimage">
                    </div>
                    <div class="col">
<<<<<<< HEAD
                        <div class="row form-group">              
                                <label class="col" for="dob">Date of birth:</label>
                                </div>
                                    <input type="date" class="col form-control mr-3" name="dob" id="dob">
                                </div>
=======
                        <div class="form-group">              
                            <label for="dob">Date of birth:</label>
                        </div>
                            <input type="date" class="col form-control" name="dob" id="dob">
                        </div>
>>>>>>> 34b9b718fa26d9db93cac2a966c12a4486c824a4
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <input type="submit" class="col-2 btn btn-secondary text-light" value="Update">
                </div>
                <div class="row justify-content-center mt-3">
                    <a class="col-2 nesto btn btn-secondary" href="admin_profile_page">Admin homepage</a>
                </div>
            </form>
        <?php endif;?>
<!--Object info edit-->
        <?php if(isset($_GET['objid'])): ?>
<<<<<<< HEAD
        <?php 
        #getting object info from db
            $sql_object = 'SELECT * from object where object_id ="'.$_GET['objid'].'";';
            $result_obj = $conn->query($sql_object);
            $object =$result_obj->fetch_assoc();
            
        ?>
            <form class="container" name="editobj" method="post" action="objid=<?php echo $_GET['objid']); ?>">
                <div class="row">
                    <div class="col m-4">
                        <h3>Change object info:</hr>
                    </div>
                </div>
=======
            
>>>>>>> 34b9b718fa26d9db93cac2a966c12a4486c824a4
                <div class="row">
                    <div class="col form-group">
                        <input type="text" class="form-control" id="objectname" name="objectname" placeholder="<?php echo $object['Object_name']; ?>">
                    </div>
                    <div class="col form-group">
                        <input type="number" class="form-control" id="price" name="price" placeholder="<?php echo $object['Price']; ?>">
                    </div>
                </div>
<<<<<<< HEAD
                <div class="row justify-content-center mt-3">
                    <input type="submit" class="btn btn-secondary text-light" value="Update">
                </div>
                <div class="row justify-content-center mt-3">
                    <a class="col-2 nesto btn btn-secondary" href="admin_profile_page">Admin homepage</a>
                </div>
            </form>
        <?php endif;?>
<!--Reservation info edit-->
        <?php if(isset($_GET['resid'])): ?>
        <!--action treba promjenit-->                               
            <form class="container" name="editres" method="post" action="?resid='.$resid.'">
                <h3>Change reservation info:</h3>
                <div class="form-group">
                <label for="datefrom">Date from:</label>
                    <input type="date" class="form-control" name="datefrom" id="datefrom">
                </div>
                <div class="form-group">
                <label for="dateto">Date to:</label>
                    <input type="text" class="form-control" name="dateto" id="dateto">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="status" id="status">
                    <label class="form-check-label" for="status">Status: </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="confirmed" id="confirmed">
                    <label class="form-check-label" for="confirmed">Confirmed: </label>
=======
      
>>>>>>> 34b9b718fa26d9db93cac2a966c12a4486c824a4
                </div>
                <input type="submit" class="btn btn-secondary text-light" value="Update">
            </form>
        <?php endif;?>
<<<<<<< HEAD


=======
>>>>>>> 34b9b718fa26d9db93cac2a966c12a4486c824a4
</body>
</html>
