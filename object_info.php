<!doctype html>
<html lang="en">
  <head>
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
            echo $row['Username'];}
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
            if(isset($_POST['fname']) && $_POST['fname']!==''){
              $sql_update_fname = 'UPDATE user set First_name = "'.$_POST['fname'].'"  where User_ID='.$_SESSION['User_ID'].'';
              $conn->query($sql_update_fname);
              unset($_POST);
              echo 'mjenjam ime';
              
            } 
            if(isset($_POST['lname']) && $_POST['lname']!==''){
              $sql_update_lname = 'UPDATE user set Last_name = "'.$_POST['lname'].'" where User_ID='.$_SESSION['User_ID'].'';
              $conn->query($sql_update_lname);
              unset($_POST);
              echo 'mjenjam prezime';
            }
            
            if(isset($_POST['dob']) && $_POST['dob']!==''){
              $sql_update_dob = 'UPDATE user set date_of_birth = "'.$_POST['dob'].'" where User_ID='.$_SESSION['User_ID'].'';
              $conn->query($sql_update_dob);
              unset($_POST);
              echo 'mjenjam dob';
            }
            #fix duplicate pic creation and remove post after upload
            if(isset($_FILES['profile_pic']['tmp_name'])){
              $target_dir = "media/pictures/";
              $ext = pathinfo($_FILES['profile_pic']['name']);
              $target_file = $target_dir . rand() .'.'.$ext['extension'];
              $sql_update_profile_pic = 'UPDATE user set User_image = "'.basename($target_file).'" where User_ID='.$_SESSION['User_ID'].';';
              if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                $conn->query($sql_update_profile_pic);
                echo 'mjenjam sliku';
                unset($_FILES);


              } 
              else {
                echo '<div class="alert alert-warning alert-dismissable fade show" role="alert">
                There was an error uploading your picture!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>';
              }
              
            }
            ?>
      </div>
     </div>
     <!--User info-->
     <div class="row justify-content-md-center">
       <div class="col col-md-2 text-center user_info ">
       <?php
          $sql_objekti_user = 'SELECT * FROM `object`,`user` WHERE object.User_ID = user.User_ID AND object.Object_ID = '.$_GET['objid'].';';
          $res_obj_usr = $conn->query($sql_objekti_user);
          foreach($res_obj_usr as $r)
          {
       ?>
        <!--if pic property of user table is empty show stock image-->
          <div class="text-center">
          <h4><div class="mt-2">Object info</div></h4>
            <hr>
            <strong>Host name:</strong> <?php echo $r['First_name'].' '.$r['Last_name']?><br>
            <strong>Object name:</strong> <?php echo $r['Object_name']?><br>
            <strong>Object description:</strong>  <?php echo $r['Object_desc']?><br>
            <strong>Price per night:</strong>  <?php echo $r['Price'].'€'?><br>
              <br>
            <?php
              if($_SESSION['Type_ID'] == 2 && $r['User_ID'] == $_SESSION['User_ID'])
              {
            ?>
            <div class="row m-4 justify-content-md-center">
              <form name="upload" action="upload_slika.php" method="post" enctype="multipart/form-data">
                <input type="file" name="files[]" multiple>
              </form>
            </div>
            <?php
              };
            ?>
              <!--Modal trigger-->
              <?php
                };
                ?>
          </div>
        </div>

         <div class="col col-md-7 text-center reservations_p shadow">
            <img src="https://static.ferienhausmiete.de/pictures/125531/bilder_original/125531_22829505223751.jpg" alt="slika" width="100%">
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
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>