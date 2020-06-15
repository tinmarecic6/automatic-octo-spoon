<!doctype html>
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
    <!--Datepicker js-->
    <script type="text/javascript" src="datepicker/moment.js"></script>
	  <script type="text/javascript" src="datepicker/daterangepicker.js"></script>
	  <link rel="stylesheet" type="text/css" href="datepicker/daterangepicker-bs3.css" />
	  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <title>CRO-BOOK</title>
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

     <form class="container mt-3 pt-4" name="newres" method="POST" action="newreservation_script.php">
                <h3 class="mb-5 text-light">Choose your reservation dates:</h3>
                <div class="row justify-content-center">
                </div>
                <div class="row justify-content-left">
                    <div class="col-3 form-group">
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
                </div>
                <div class="row justify-content-center mt-5">
                    <input type="submit" class="col-2 btn btn-secondary text-light" value="Reserve">
                    <input type="hidden" value="<?php echo $_GET['objid']; ?>" name="Object_ID">
                </div>

                <div class="row justify-content-center mt-3">
                    <a class="col-2 btn btn-secondary" href="homepage.php">Homepage</a>
                </div>
            </form>
          <!--Footer-->  
      <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-sm-12 p-4 text-center footer">
              Courtesy of TIN_MAR&co &copy
            </div>
        </div>
      </div>
   
    

    <!-- Optional JavaScript -->
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>