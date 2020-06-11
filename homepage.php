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
    <title>CRO-BOOK</title>
  </head>
  <body>
    <!--Banner-->
   <div class="container-fluid">
     <div class="row justify-content-md-center">
       <div class="col col-lg-2 text-center p-4 banner">
       <a href="homepage.php"><img src="media/CROBOOK_logo.png" alt="logo" width="200"></a>
        </div>
       <div class="col-md-auto col-lg-5 ">
         <?php 
         session_start();
         require_once('scripts/db.php');
         $conn = db();
         ?>
        </div>
       <div class="col col-lg-2 p-4 text-center banner ">
       <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="media/profile_white.png" alt="userpic" height="30" title="userpic">
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <h6 class="dropdown-header text-center">
          <?php 
          $sql_user = 'Select * from `user` where `User_ID` = "'.$_SESSION['User_ID'].'"; ';
          $result = $conn->query($sql_user);
          if($result && $result->num_rows==1){
            $row = $result->fetch_assoc();
            echo $row['Username'];
          }
          ?>
          </h6>
            <a class="dropdown-item" href="homepage.php">Homepage</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </div>
            
      </div>
     </div>
     <!--User info - ovdje ide navigacija--> 
     <div class="row justify-content-md-center">
       <div class="col col-md-2 user_info navigacija">
        <!--if pic property of user table is empty show stock image-->
          <div class="text-center pt-3" style="width:100%">
              <div class="navbar-brand"><a href="homepage.php">Home</a></div><br>
              <!-- ovdje treba dodati da link "my profile" vodi na skriptu koja ce ovisno o user_id-u 
              voditi ili na user_profile_page.php ili na host_profile_page.php -->
              <div class="navbar-brand"><a href="profile_redirect.php">My profile</a></div>
          </div>
        </div>
        <!--if has no past reservations show "You have no reservations, make your first!-->
         <div class="col col-md-7 text-center reservations_p shadow pt-5"><h3>Your next vacation</h3>
          <!--reservation info goes here-->
          <div class="text-left">
          <div class="container-fluid">
            <div class="row justify-content-center mt-5">
          <?php

          for($i = 0;$i<15;$i++){
            echo'
                <div class="col col-sm-12 m-3">
                  <div class="card kartice">
                    <div class="card-body">
                      <div class="container">
                        <div class="row">
                          <div class="col-2">
                            <img src="media/sg.jpeg" alt="slika" width="100%"></img>
                          </div>
                          <div class="col-7">
                            <div class="row">
                              Host: Pero Perić
                            </div>
                            <br>
                            <div class="row">
                              Description:<br>
                              Ova kuca je mega. Imate kuhinju i dnevni boravak, wi-fi, televiziju, sve sto ce vam ikad trebat u zivotu. Parking je besplatan.
                            </div>
                          </div>
                          <div class="col text-right">
                            Price for one night: <br>
                            1.000,00 HRK
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              ';}
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