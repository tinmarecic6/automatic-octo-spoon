<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style-main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Cro Book</title>
  </head>
  <body>
      <div class="w-100 p-3 text-center" id="navigacija">
        <!--Napravi banner s logom i user id-em-->
      <div class="row justify-content-center">
          <div class="col-3">
              <img src="media/crobook_logo_white.png" alt="logusina" height="200">
          </div>
          <div class="col-4 display-1 font-weight-bold align-self-center">
              CRO-BOOK
          </div>
      </div>
     <!-- <div class="display-3 p-5 mb-5">SALVATORE GANAČEVIĆ</div>-->
      </div>
  <!--napravi login form-->
    <div class="container-fluid">
      <!--sluzi za pomaknuti login form i nesto o nama par piksela dolje-->
      <div class="row">
        <div class="col-sm-12 p-5"></div>
      </div>
        <div class="row text-center justify-content-around ">
            <div class="col-sm-4  text-center ">
              <a class="btn btn-primary m-3" data-toggle="collapse" href="#collapseLogin" role="button" aria-expanded="false" aria-controls="collapseLogi">
                LogIn
              </a>
              <div class="collapse" id="collapseLogin">
                <div class="card card-body" style="background:none">
                  <form name="login_form" method="post" action="login_script.php">
                      <div class="form-row mt-2 mb-2 justify-content-around">
                        <input type="text" class="col col-sm-5 form-control" id="username" name="username" placeholder="Username" required>
                      </div>
                      <div class="form-row mt-2 mb-2 justify-content-around">
                        <input type="password" class="col col-sm-5 form-control" id="pass" name="pass" placeholder="Password" required>
                      </div>
                      <div class="form-row mt-2 mb-2 justify-content-around">
                        <input type="submit" value="Login" class="mt-2 btn btn-dark">
                      </div>
                    </form>
                </div>
              </div>
                        <?php
                          session_start();
                          if(isset($_SESSION['error_mess'])){
                            echo $_SESSION['error_mess'];
                            unset($_SESSION['error_mess']);
                          }
                        ?>
              <br>
              <a class="btn btn-primary m-3 " data-toggle="collapse" href="#collapseSignup" role="button" aria-expanded="false" aria-controls="collapseSignup">
                Sign Up
              </a>
              <div class="collapse" id="collapseSignup">
                <div class="card card-body" style="background:none">
                  <form name="signup_form" method="post" action="signup_script.php" enctype="multipart/form-data">
                   <div class="form-row justify-content-around">
                   <!-- First name: -->
                   <input type="text" class="col col-sm-5 form-control" name="fname" id="fname" placeholder="First name" required>
                   <!-- Last name: -->
                   <input type="text" class="col col-sm-5 form-control" name="lname" id="lname" placeholder="Last name" required>
                  </div>
                  <div class="form-row mt-3 justify-content-around">
                        <!-- username -->
                        <input type="text" class="col col-sm-5 form-control" name="username_signup" id="username" placeholder="Username" required>
                        <!-- password -->
                        <input type="password" class="col col-sm-5 form-control" name="password_signup" id="password" placeholder="Password" required>
                   </div>
                   <!-- Date of birth:<br> -->
                   <div class="form-row mt-3 justify-content-around">
                      <!-- email -->
                      <input type="email" class="col col-sm-5 form-control" name="email" id="email" placeholder="Email" required>
                      <!-- phone -->
                      <input type="date" class="col col-sm-5 form-control" name="dob" id="dob" placeholder="Your birthday date">
                   </div>
                   <div class="form-row mt-3 justify-content-around">
                      <div class="col col-sm-7">
                        <input type="file" class="form-control-file" name="profile_pic" id="profile_pic"> 
                        <label for="profile_pic">Upload your profile picture here.</label>
                      </div>
                   </div>
                    <input type="submit" value="Sign Up" class="mt-2 btn btn-info">
                    <br><br>
                    </form>
                </div>
              </div>
            </div>
            <div class="col-sm-4 m-1 p-3 nesto_nama">
              Looking for a place to stay on your next vacation?
              <br>
              We are here to help with that, simply login and start searching, it is that easy!
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-sm-12 mt-5 text-center fixed-bottom footer">Courtesy of TIN_MAR&co &copy</div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>