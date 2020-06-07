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
    <title>Admin page</title>
  </head>
  <body>
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
    
    ?>
    <!--Banner-->
   <div class="container-fluid">
     <div class="row justify-content-md-center">
       <div class="col col-lg-2 text-center p-4 banner">
         Logo i ime stranice
        </div>
       <div class="col-md-auto col-lg-5 ">
         
        </div>
       <div class="col col-lg-2 p-4 text-center banner ">
       <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="media/person-fill.svg" alt="userpic" height="30" title="userpic">
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <h6 class="dropdown-header text-center">
          <?php 
          $sql_user = 'Select * from `user` where `User_ID` = "'.$_SESSION['User_ID'].'"; ';
          $result = $conn->query($sql_user);
          if($result && $result->num_rows==1){
            $row = $result->fetch_assoc();
            echo $row['Username'].'--Admin';
          }
          ?>
          </h6>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Info</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </div>
            
      </div>
     </div>
     <!--User info-->
     <div class="row justify-content-md-center">
       
        <!--if has no past reservations show "You have no reservations, make your first!-->
         <div class="col col-md-11 text-center reservations_p shadow pt-5"><h3>Admin page</h3>
          <!--reservation info goes here-->
          <div class="text-left">
          <div class="container-fluid">
            <div class="row justify-content-left mt-5">
          <?php
          $sql_all_user = 'SELECT * from user';
          $result_all_user = $conn->query($sql_all_user);
          

          echo
          '<div class="col col-sm-12">
            <table class="table table-hover table-dark">';
            echo '<thead><tr>
            <th>User ID</th>
            <th>Username</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Profile picture</th>
            <th>Type ID</th>
            <th>DOB</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th></tr></thead>';
              foreach($result_all_user as $user){
                echo '<tr>';
                foreach($user as $col){
                  echo '<td>'.$col.'</td>';
                }
                echo '</tr>';
              }
          echo
            '</table>
            <hr>
          </div>
          ';

          $sql_all_location = 'SELECT * from location';
          $result_all_location = $conn->query($sql_all_location);
          echo
          '<div class="col col-sm-12">
          <table class="table table-hover table-dark">';
          echo '<thead><tr>
          <th>Location ID</th>
          <th>Street address</th>
          <th>Street nombre</th>
          <th>City</th>
          <th>State</th>
          <th>Zip code</th>
          <th>Edit</th>
          <th>Delete</th></tr></thead>';
            foreach($result_all_location as $location){
              echo '<tr>';
              foreach($location as $loc){
                echo '<td>'.$loc.'</td>';
                
              }
              var_dump($location);
              echo '<td><a href="admin_edit.php?locid='.$location['Location_ID'].'">Edit</a></td>';
              echo '<td>Delete</td>';
              echo '</tr>';
            }
        echo
          '</table>
          <hr>
        </div>';

        $sql_all_obj = 'SELECT * from object';
        $result_all_obj = $conn->query($sql_all_obj);
          echo
          '<div class="col col-sm-12">
            <table class="table table-hover table-dark">';
            echo '<thead><tr>
            <th>Object ID</th>
            <th>Object name</th>
            <th>Price</th>
            <th>Location ID</th>
            <th>User ID</th>
            <th>Edit</th>
            <th>Delete</th></tr></thead>';
              foreach($result_all_obj as $obj){
                echo '<tr>';
                foreach($obj as $obj){
                  echo '<td>'.$obj.'</td>';
                }
                echo '</tr>';
              }
          echo
            '</table>
          </div>';
          ?>
          
            </div>
          </div>
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