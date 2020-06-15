<!doctype html>
<html lang="en">
  <head>
    <link rel="icon" type="image/ico" href="media/favicon.ico"/>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/user_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Host page</title>
  </head>
  <body>
    <!--Banner-->
   <div class="container-fluid">
     <div class="row justify-content-md-center">
       <div class="col col-lg-2 text-center p-4 banner">
       <a href="homepage.php"><img src="media/crobook_logo_white.png" alt="logo" width="200"></a>
        </div>
       <div class="col-md-auto col-lg-5 ">
         <?php
         require_once('scripts/db.php');
         $conn = db();
         session_start();
         if(!isset($_SESSION['User_ID']) || $_SESSION['Type_ID']!=2){
          header("Location: index.php");
         }
         $sql_user = 'SELECT * FROM user where User_ID = "'.$_SESSION['User_ID'].'";';
         $result = $conn->query($sql_user);
         ?>
        </div>
       <div class="col col-lg-2 p-4 text-center banner ">
       <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="media/profile_white.png" alt="userpic" height="30" title="userpic">
          </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
          <h6 class="dropdown-header text-center">
          <?php 
          if($result && $result->num_rows==1){
            $row = $result->fetch_assoc();
            echo $row['Username'].' -- Host';}
          ?>
          </h6>
            <a class="dropdown-item" href="homepage.php">Homepage</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </div>  
      </div>
     </div>

     <!--Update info error row-->
     <div class="row justify-content-md-center">
      <div class="col col-md-10 ">
            <?php
            $changed=0; 
            if(isset($_POST['username']) && $_POST['username']!==''){
              $sql_update_username = 'UPDATE user set Username = "'.$_POST['username'].'"  where User_ID='.$_SESSION['User_ID'].'';
              $conn->query($sql_update_username);
              $changed = 1;
            }

            if(isset($_POST['password']) && $_POST['password']!==''){
              $sql_update_password = 'UPDATE user set Password = "'.md5($_POST['username']).'"  where User_ID='.$_SESSION['User_ID'].'';
              $conn->query($sql_update_password);
              $changed = 1;
            }

            if(isset($_POST['fname']) && $_POST['fname']!==''){
              $sql_update_fname = 'UPDATE user set First_name = "'.$_POST['fname'].'"  where User_ID='.$_SESSION['User_ID'].'';
              $conn->query($sql_update_fname);
              $changed = 1;
            }

            if(isset($_POST['lname']) && $_POST['lname']!==''){
              $sql_update_lname = 'UPDATE user set Last_name = "'.$_POST['lname'].'" where User_ID='.$_SESSION['User_ID'].'';
              $conn->query($sql_update_lname);
              $changed = 1;
            }
            
            if(isset($_POST['dob']) && $_POST['dob']!==''){
              $sql_update_dob = 'UPDATE user set date_of_birth = "'.$_POST['dob'].'" where User_ID='.$_SESSION['User_ID'].'';
              $conn->query($sql_update_dob);
              $changed = 1;
            }
            
            if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error']!=4){
              if(isset($_FILES['profile_pic']['tmp_name'])){
                $changed = 1;
                $target_dir = "media/pictures/";
                $ext = pathinfo($_FILES['profile_pic']['name']);
                $target_file = $target_dir . rand() .'.'.$ext['extension'];
                $sql_update_profile_pic = 'UPDATE user set User_image = "'.basename($target_file).'" where User_ID='.$_SESSION['User_ID'].';';
                if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)==1) {
                  $conn->query($sql_update_profile_pic);
                  $_FILES = array();
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
            ?>
      </div>
     </div>
     <!--User info-->
     <div class="row justify-content-md-center">
       <div class="col col-md-2 text-center user_info ">
        <!--if pic property of user table is empty show stock image-->
        <?php
          if($row['User_image'] !== ''){
            echo '<img src="media/pictures/'.$row['User_image'].'" alt="profile_pic" width="80%" class="mt-2 rounded border "><br>';
          }
          else{
            echo '<img src="media/profil.png" alt="profile_pic" width="60%" class="mt-2 rounded-circle border border-dark"><br>';
          }
        ?>
          <div class="text-center">
          <h4><div class="mt-2">User info</div></h4>
            <hr>
            First name: <?php echo $row['First_name']?><br>
            Last name:  <?php echo $row['Last_name']?><br>
            Date of birth: <?php echo $row['Date_of_birth']?><br><hr>
            Edit your user info here!
              <br>
              <!--Modal trigger-->
              <button type="button" class="btn btn-secondary m-3" data-toggle="modal" data-target="#infoedit">
                  Edit
              </button>
              <!--Modal-->
              <div class="modal fade" id="infoedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content kartice">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        <?php
                          #username-title
                          echo 'Name: '.$row['First_name'].' '.$row['Last_name'];
                        ?>
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-left ml-3">
                      <form enctype="multipart/form-data" name="edit_info" method="POST"  action="?user=<?php echo $_SESSION['User_ID']; ?>">
                        <div class="row">
                          <div class="col-3">Username:</div>
                          <div class="col"><input type="text" name="username" class="m-2" placeholder="<?php echo $row['Username']; ?>"></div>
                        </div>
                        <div class="row">
                          <div class="col-3">Password:</div>
                          <div class="col"><input type="text" name="password" class="m-2" placeholder="********"></div>
                        </div>
                        <div class="row">
                          <div class="col-3">First name:</div>
                          <div class="col"><input type="text" name="fname" class="m-2" placeholder="<?php echo $row['First_name']; ?>"></div>
                        </div>
                        <div class="row">
                          <div class="col-3">Last name:</div>
                          <div class="col"><input type="text" name="lname" class="m-2" placeholder="<?php echo $row['Last_name']; ?>"></div>
                        </div>
                        <div class="row">
                          <div class="col-3">Date of birth:</div>
                          <div class="col"><input type="date" name="dob" class="m-2" placeholder="<?php echo $row['Date_of_birth']; ?>"></div>
                        </div>
                        Upload or change your profile picture:<br><br> <input type="file" class="form-control-file" name="profile_pic" id="profile_pic">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit"  class="btn btn-primary text-light" value="Save changes">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row m-4 justify-content-md-center">
              <a class="btn btn-secondary text-light" href="newobject.php">Host a new home!</a>
              </div>
          </div>
        </div>

    <div class="col col-md-7 text-center reservations_p shadow">
      <?php
        if(isset($changed) && $changed == 1)
        {
          $_SESSION['changed'] = 1;
          $changed=0;
        };
      ?>
      <?php if(isset($_SESSION['changed']) && $_SESSION['changed'] == 1):?>
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>Success! </strong>Your info has been edited.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php
        $_SESSION['changed'] = 0;

        endif;
      ?>
      <?php
        if(isset($_SESSION['insertedobj']) && $_SESSION['insertedobj'] == 1):
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong>New object has been hosted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php
        $_SESSION['insertedobj'] = 0;
        endif;
      ?>

          <?php
              if(isset($_SESSION['deletedobject']) && $_SESSION['deletedobject'] == 1):
          ?>
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                  <strong>Success! </strong>Your object has been deleted.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
          
            <?php
              $_SESSION['deletedobject'] = 0;
              endif;
            ?>

            <?php
              if(isset($_SESSION['postao']) && $_SESSION['postao'] == 1):
          ?>
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                  <strong>Success! </strong>You are now a host!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
          
            <?php
              $_SESSION['postao'] = 0;
              endif;
            ?>

         <!--if has no past reservations show "You have no objects, host your first!-->
         <h3 class="mt-4 mb-4">Your objects</h3>
         <div class="row">
         <?php
          $sql_objects = 'SELECT * FROM `object` where object.User_ID = '.$_SESSION['User_ID'].';';
          $result_objects = $conn->query($sql_objects);
          if($result_objects->num_rows>0){
            foreach ($result_objects as $ro){
              echo '
                <div class="col col-sm-4 m-0">
                <div class="card kartice">
                <div class="card-body" style="height: 10%;">
                <h5 class="card-title"><img src="media/house.svg" class="mr-3" height="22">Object no. '.$ro['Object_ID'].'</h5>
                <h6 class="card-subtitle mt-4" style="height: 6rem;">
                  Object name: '.$ro['Object_name'].' <br>
                  Price: '.$ro['Price'].'<br>
                  Location: '.$ro['Location_ID'].'
                </h6>
                <hr style="border-bottom: 1px dashed white;">
                  <div class="row">
                    <a href="object_info.php?objid='.$ro['Object_ID'].'" class="col card-link mt-auto">View info</a>
                    <a href="object_delete.php?objid='.$ro['Object_ID'].'" class="col card-link mt-auto">Delete</a>
                  </div>
                </div>
              </div>
            </div>
            '; 
            }
          }
          ?>
          </div>
          <!--if has no past reservations show "You have no reservations, make your first!-->
          <div class="mt-4 mb-4"></div>
          <?php
              if(isset($_SESSION['deleted']) && $_SESSION['deleted'] == 1):
          ?>
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                  <strong>Success! </strong>Your reservation has been deleted.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
          
            <?php
              $_SESSION['deleted'] = 0;
              endif;
            ?>
         <h3 class="mt-4 mb-4">Your reservations</h3>
          <!--reservation info goes here-->
          <div class="row">
          <?php
          $sql_vacay = 'SELECT * FROM reservation,object where reservation.User_ID = '.$_SESSION['User_ID'].' and reservation.Object_ID=object.Object_ID ;';
          $result_vacay = $conn->query($sql_vacay);
          if($result_vacay->num_rows>0){
            foreach ($result_vacay as $rv){
              echo '<div class="col col-sm-4 m-0 mb-5">
              <div class="card kartice">
                  <div class="card-body" style="height: 10%;">
                    <h5 class="card-title"><img src="media/palm.png" class="mr-3" height="22">Vacation ID: '.$rv['Reservation_ID'].'</h5>
                    <h6 class="card-subtitle mt-4">Start date: '.$rv['Date_from'].' <br>End date: '.$rv['Date_to'].'</h6>
                    <p class="card-text mt-3">You booked a trip to '.$rv['Object_name'].' for a price of '.$rv['Price'].' € per night</p>
                    <hr style="border-bottom: 1px dashed white;">
                    <a href="res_delete.php?resid='.$rv['Reservation_ID'].'" class="col card-link mt-auto">Delete</a>
                  </div>
                </div>
              </div>'; 
          }
        }
        else{
          echo '</div><div class="row justify-content-center align-items-center">You have no reservations, reserve now!</div>';
          echo '<div class="row justify-content-center align-items-center"><a href="homepage.php" class="col-3 m-3 btn btn-outline-light"><h5 class="mt-2">Reserve here</h5></a></div>';
        }
          ?>
            </div>
      </div>
   </div>     
          <!--Footer-->  
      <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-sm-12 p-4 text-center  footer">
              Courtesy of TIN_MAR&co &copy
            </div>
        </div>
      </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>