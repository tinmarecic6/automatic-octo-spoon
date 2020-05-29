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
    <title>User page</title>
  </head>
  <body>
    <!--Banner-->
   <div class="container-fluid">
     <div class="row justify-content-md-center">
       <div class="col col-lg-2 text-center p-4 banner">
         Logo i ime stranice
        </div>
       <div class="col-md-auto col-lg-5 ">
         <?php
         
         ?>
        </div>
       <div class="col col-lg-2 p-4 text-center banner ">
       <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Korisnicko ime
            <img src="media/person-fill.svg" alt="userpic" height="30" title="userpic">
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Info</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </div>
            
      </div>
     </div>
     <!--User info-->
     <div class="row justify-content-md-center">
       <div class="col col-md-2 text-center user_info ">
        <!--if pic property of user table is empty show stock image-->
          <img src="media/profil.png" alt="profile_pic" width="50%" class="mt-2 rounded-circle border border-dark"><br> 
          <div class="text-left">
            User info<br>
            <hr>
            First name:<br>
            Last name:<br>
            Date of birth:<br>
            Address:<br><hr>
            Edit your settings and user info here!
          <br><button class="btn btn-dark m-3">Edit</button>
          </div>
        </div>
        <!--if has no past reservations show "You have no reservations, make your first!-->
         <div class="col col-md-7 text-center reservations_p shadow"><h3>Your past reservations</h3>
          <!--reservation info goes here-->
          <div class="text-left">
          <div class="container-fluid">
            <div class="row justify-content-center mt-5">
          <?php
          /*if no pic in table show stock image.svg
          if($r['Picture_ID']){
            echo '<div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="'$r[Picture_ID]'" alt="Location image">
                  <div class="card-body">
                    <h5 class="card-title">'$r[State]'.,.'$r['City']</h5>
                    <p class="card-text">info o putovanju</p>
                    <a href="#" class="btn btn-primary">Details</a>
                  </div>
                </div>'
          }
          
          
          
          *//*modify once db is running*/ 
          for($i = 0;$i<3;$i++){
          echo '<div class="col col-sm-3 m-2">
              <div class="card" >
                  <div class="card-body">
                    <h5 class="card-title"><img src="media/house.svg" class="mr-3" height="22">Odmor broj '.($i+1).'</h5>
                    <h6 class="card-subtitle  text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
              </div><!--column-->';}
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