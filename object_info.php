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
    <title>Object info</title>
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
         $sql_user = 'SELECT * FROM `user`,`user_type` where user.User_ID = "'.$_SESSION['User_ID'].'" AND user_type.Type_ID = user.Type_ID;';
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
            echo $row['Username'].' -- '.$row['User_type'];}
          ?>
          </h6>
            <a class="dropdown-item" href="homepage.php">Homepage</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </div>  
      </div>
     </div>
     <!--User info-->
     <div class="row justify-content-md-center">
       <div class="col col-md-2 text-center user_info ">
       <?php
          $sql_slike = 'SELECT * FROM object_images where Object_ID = '.$_GET['objid'].';';
          $result_slike = $conn->query($sql_slike);
          $sql_objekti_user = 'SELECT * FROM `object`,`user` WHERE object.User_ID = user.User_ID AND object.Object_ID = '.$_GET['objid'].';';
          $res_obj_usr = $conn->query($sql_objekti_user);
          foreach($res_obj_usr as $r)
          {
       ?>
        <!--if pic property of user table is empty show stock image-->
          <div class="text-center">

          <?php foreach($result_slike as $rs){
          echo '<img class="mt-3" src="media/object_images/'.$rs['Picture'].'" alt="'.$rs['Picture'].'" width="100%">' ;
          break;
          }
          ?>

          <h4><div class="mt-4">Object info</div></h4>
            <hr>
            <strong>Host name:</strong> <?php echo $r['First_name'].' '.$r['Last_name']?><br>
            <strong>Object name:</strong> <?php echo $r['Object_name']?><br>
            <strong>Object description:</strong>  <?php echo $r['Object_desc']?><br>
            <strong>Price per night:</strong>  <?php echo $r['Price'].'€'?><br>
            <?php
              if($r['User_ID'] != $_SESSION['User_ID'])
              {
            ?>
            <div class="row p-5 m-0 justify-content-md-center">
              <form name="contact" action="mailto:
                <?php 
                $sql_mail = 'SELECT * FROM `user`, `email` where `user`.User_ID = `email`.User_ID';
                $res_mail = $conn->query($sql_mail);
                foreach($res_mail as $m)
                {
                  echo $m['Email'];
                }
                ?>" method="post">
                <input type="submit" class="mt-4 btn btn-secondary" value="Contact the host">
                
                <input type="hidden" value="<?php echo $_GET['objid']; ?>" name="object_id">
              </form>
            </div>
            <?php
              };
            ?>
            <?php
              if($_SESSION['Type_ID'] == 2 && $r['User_ID'] == $_SESSION['User_ID'])
              {
            ?>
            <div class="row p-5 m-0 justify-content-md-center">
              Upload images:<br><br>
              <form name="upload" action="upload_slika.php" method="post" enctype="multipart/form-data">
                <input class="btn btn-secondary col" type="file" name="files[]" multiple>
                <input type="submit" class="mt-4 btn btn-secondary" value="Upload">
                
                <input type="hidden" value="<?php echo $_GET['objid']; ?>" name="object_id">
              </form>
            </div>
            <?php
              };
            ?>
              <?php
                };
                ?>
          </div>
        </div>

         <div class="col col-md-7 text-center reservations_p shadow">
           
         
            
         <?php if($result_slike->num_rows<1):?>
            <?php if($_SESSION['Type_ID'] == 2 && $r['User_ID'] == $_SESSION['User_ID'])
              { ?>
            <h4 class="mt-5">You haven't uploaded any pictures yet, do it now!</h4> <?php }; ?>
         <?php else:?>
         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="position: relative;">
          <div class="carousel-inner p-5">
            <div class="carousel-item active ">
              <?php
              echo '<img class="pt-4" style="max-width:80%;" src="media/object_images/'.$rs['Picture'].'" alt="'.$rs['Picture'].'">'; ?>
            </div>
            <?php 
            $i = 1;
            foreach($result_slike as $rs){
              if($i!=1)
              {
                echo
                '
                <div class="carousel-item">
                  <img class="pt-4" style="max-width:80%;" src="media/object_images/'.$rs['Picture'].'" alt="'.$rs['Picture'].'">
                </div>
                '; 
              }
              $i++;
            }
            ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
         <?php endif;?>
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