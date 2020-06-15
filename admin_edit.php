<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/ico" href="media/favicon.ico"/>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/user_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Edit info</title>
    <!--Datepicker-->
    <script type="text/javascript" src="datepicker/moment.js"></script>
	<script type="text/javascript" src="datepicker/daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="datepicker/daterangepicker-bs3.css" />
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
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
/* OBJEKTI */
    if(isset($_GET['objid']) && $_GET['objid']!='' ){
        $objid = $_GET['objid'];
    }
/* REZERVACIJE */
    if(isset($_GET['resid']) && $_GET['resid']!='' ){
        $resid = $_GET['resid'];
    }

/* USERI */
    if(isset($_POST['username']) && $_POST['username']!= ''){
        $sql_update_username = 'UPDATE `user` SET `Username`="'.$_POST['username'].'" WHERE `User_ID` = '.$userid.';';
        $conn->query($sql_update_username);
        $insertedadmin = 1;
    };
    if(isset($_POST['firstname']) && $_POST['firstname']!= ''){
        $sql_update_first_name = 'UPDATE `user` SET `First_name`="'.$_POST['firstname'].'" WHERE `User_ID` = '.$userid.';';
        $conn->query($sql_update_first_name);
        $insertedadmin = 1;

    };
    if(isset($_POST['lastname']) && $_POST['lastname']!= ''){
        $sql_update_last_name = 'UPDATE `user` SET `Last_name`="'.$_POST['lastname'].'" WHERE `User_ID` = '.$userid.';';
        $conn->query($sql_update_last_name);
        $insertedadmin = 1;
    };
    if(isset($_FILES['userimage'])){
        if(isset($_FILES['userimage']) && $_FILES['userimage']['error']!=4){
            if(isset($_FILES['userimage']['tmp_name'])){
              $target_dir = "media/pictures/";
              $ext = pathinfo($_FILES['userimage']['name']);
              $target_file = $target_dir . rand() .'.'.$ext['extension'];
              $sql_update_profile_pic = 'UPDATE user set User_image = "'.basename($target_file).'" where User_ID='.$userid.';';
              echo $sql_update_profile_pic;
              if (move_uploaded_file($_FILES['userimage']['tmp_name'], $target_file)==1) {
                $conn->query($sql_update_profile_pic);
                $_FILES = array();
                $insertedadmin = 1;
              }
              else {
                echo '<div class="alert alert-warning alert-dismissable fade show" role="alert">
                There was an error uploading your picture!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>';
              }
            } 
          }
    };
    if(isset($_POST['typeid']) && $_POST['typeid']!= ''){
        $sql_update_type_id = 'UPDATE `user` SET `Type_id`="'.$_POST['typeid'].'" WHERE `User_ID` = '.$userid.';';
        $conn->query($sql_update_type_id);
        $insertedadmin = 1;
    };
    if(isset($_POST['dob']) && $_POST['dob']!= ''){
        $sql_update_dob = 'UPDATE `user` SET `Date_of_birth`="'.$_POST['dob'].'" WHERE `User_ID` = '.$userid.';';
        $conn->query($sql_update_dob);
        $insertedadmin = 1;
    };
    if(isset($_POST['password']) && $_POST['password']!= ''){
        $sql_update_password = 'UPDATE `user` SET `Password`="'.md5($_POST['password']).'" WHERE `User_ID` = '.$userid.';';
        $conn->query($sql_update_password);
        $insertedadmin = 1;
    };
    if(isset($insertedadmin) && $insertedadmin == 1)
    {
        $_SESSION['insertedadmin'] = 0;
        header("Location: admin_profile_page.php");
    };

/* OBJEKTI */

    if(isset($_POST['objectname']) && $_POST['objectname']!= ''){
        $sql_update_objectname = 'UPDATE `object` SET `Object_name`="'.$_POST['objectname'].'" WHERE `Object_ID` = '.$objid.';';
        $conn->query($sql_update_objectname);
        $insertedadmin = 1;
    };
    if(isset($_POST['price']) && $_POST['price']!= ''){
        $sql_update_price = 'UPDATE `object` SET `Price`="'.$_POST['price'].'" WHERE `Object_ID` = '.$objid.';';
        $conn->query($sql_update_price);
        $insertedadmin = 1;
    };
    if(isset($_POST['objectdesc']) && $_POST['objectdesc']!= ''){
        $sql_update_objectdesc = 'UPDATE `object` SET `Object_desc`="'.$_POST['objectdesc'].'" WHERE `Object_ID` = '.$objid.';';
        $conn->query($sql_update_objectdesc);
        $insertedadmin = 1;
    };
    if(isset($insertedadmin) && $insertedadmin == 1)
    {
        $_SESSION['insertedadmin'] = 0;
        header("Location: admin_profile_page.php");
    };

/* REZERVACIJE */

    if(isset($_POST['reservation']) && $_POST['reservation']!= ''){
        $res = explode(' - ',$_POST['reservation']);
        $datefrom = strtotime($res[0]);
        $date_from_conv = date('Y-m-d',$datefrom);
        $dateto = strtotime($res[1]);
        $date_to_conv = date('Y-m-d',$dateto);
        $sql_date_res = 'UPDATE `reservation` set Date_from = "'.$date_from_conv.'", Date_to = "'.$date_to_conv.'" WHERE `Reservation_ID` = '.$resid.';';
        $conn->query($sql_date_res);
        $insertedadmin = 1;
    };
    if(isset($_POST['status']) && $_POST['status']!= ''){
        $sql_update_status = 'UPDATE `reservation` SET `Status`="'.$_POST['status'].'" WHERE `Reservation_ID` = '.$resid.';';
        $conn->query($sql_update_status);
        $insertedadmin = 1;
    };
    if(isset($_POST['confirmed']) && $_POST['confirmed']!= ''){
        $sql_update_confirmed = 'UPDATE `reservation` SET `Confirmed`="'.$_POST['confirmed'].'" WHERE `Reservation_ID` = '.$resid.';';
        $conn->query($sql_update_confirmed);
        $insertedadmin = 1;
    };
    if(isset($insertedadmin) && $insertedadmin == 1)
    {
        $_SESSION['insertedadmin'] = 1;
        header("Location: admin_profile_page.php");
    };

?>
</head>
<body>

<!--User info edit-->
    <?php if(isset($_GET['userid'])): ?>
        <?php 
        #getting user info from db
            $sql_user = 'SELECT * from `user` where User_ID ="'.$_GET['userid'].'";';
            $result_user = $conn->query($sql_user);
            $user =$result_user->fetch_assoc();
            $sql_user_type='SELECT * FROM `user_type`;';
            $result_type=$conn->query($sql_user_type);
            #$type=$result_type->fetch_assoc();

        ?>
         <form class="container mt-5 pt-4" enctype="multipart/form-data" name="edituser" method="POST" action="?userid=<?php echo $userid; ?>">
                <h3 class="mb-5">Change user info:</h3>
                <div class="row">
                    <div class="col form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $user['Username']; ?>">
                    </div>
                    <div class="col form-group">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?php echo $user['First_name']; ?>">
                    </div>
                    <div class="col form-group">
                        <input type="text" class="form-control" id="lastname" name="lastname"placeholder="<?php echo $user['Last_name']; ?>">
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
                            <!-- <option value="1">Admin</option> -->
                            <?php 
                            foreach($result_type as $t){
                                echo '<option value="'.$t['Type_ID'].'">'.$t['User_type'].'</option>';
                            }
                            ?>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="userimage">User image:</label>
                        <input type="file" class="form-control-file" name="userimage" id="userimage">
                    </div>
                    <div class="col">
                        <div class="row form-group">              
                                <label class="col" for="dob">Date of birth:</label>
                                </div>
                                    <input type="date" class="col form-control mr-3" name="dob" id="dob">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <input type="submit" class="col-2 btn btn-secondary text-light" value="Update">
                </div>
                <div class="row justify-content-center mt-3">
                    <a class="col-2 btn btn-secondary" href="admin_profile_page.php">Admin homepage</a>
                </div>
            </form>
        <?php endif;?>
<!--Object info edit-->
        <?php if(isset($_GET['objid'])): ?>
        <?php 
        #getting object info from db
            $sql_object = 'SELECT * from object where object_id ="'.$_GET['objid'].'";';
            $result_obj = $conn->query($sql_object);
            $object =$result_obj->fetch_assoc();
            
        ?>
            <form class="container mt-5 pt-4" name="editobj" method="POST" action="?objid=<?php echo $objid; ?>">
                <h3 class="mb-5">Change object info:</h3>
                
                <div class="row">
                    <div class="col form-group">
                        <input type="text" class="form-control" id="objectname" name="objectname" placeholder="<?php echo $object['Object_name']; ?>">
                    </div>
                    <div class="col form-group">
                        <input type="number" class="form-control" id="price" name="price" placeholder="<?php echo $object['Price']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="objectdesc" placeholder="<?php echo $object['Object_desc']; ?>">
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <input type="submit" class="col-2 btn btn-secondary text-light" value="Update">
                </div>
                <div class="row justify-content-center mt-3">
                    <a class="col-2 btn btn-secondary" href="admin_profile_page.php">Admin homepage</a>
                </div>
            </form>
        <?php endif;?>
<!--Reservation info edit-->
        <?php if(isset($_GET['resid'])): ?>
            <form class="container mt-5 pt-4" name="editres" method="POST" action="?resid=<?php echo $resid; ?>">
                <h3 class="mb-5">Change reservation info:</h3>
                <div class="form-group">
                <fieldset>
                      <div class="control-group">
                        <div class="controls">
                        <div class="input-prepend input-group">
                          <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                          <input required type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" autocomplete="off"  placeholder="Razdoblje boravka" /> 
                        </div>
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="status" value="1">
                    <label class="form-check-label" for="status">Status</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="confirmed" value="1">
                    <label class="form-check-label" for="confirmed">Confirmed</label>
                </div>
                <div class="row justify-content-center mt-5">
                    <input type="submit" class="col-2 btn btn-secondary text-light" value="Update">
                </div>
                <div class="row justify-content-center mt-3">
                    <a class="col-2 btn btn-secondary" href="admin_profile_page.php">Admin homepage</a>
                </div>
            </form>
        <?php endif;?>

<!--Datepicker-->
<script type="text/javascript">
	 		var today = new Date();
            var tomorow = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1; //January is 0!
			var yyyy = today.getFullYear();

			if (dd < 10) {
			  dd = '0' + dd;
			}

			if (mm < 10) {
			  mm = '0' + mm;
			}
			var sd = dd + 1;
			today = dd + '-' + mm + '-' + yyyy;
			tomorow = sd + '-' + mm + '-' + yyyy;	
			
			$('#reservation').daterangepicker(
			  { 
			  	format: "DD-MM-YYYY",
			  	startDate:today,
			  	endDate:tomorow,
			    minDate: today,
			  },
			  function(start, end, label) {
			  }
			);
	</script>
</body>
</html>
