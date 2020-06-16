<?php 
session_start();
require_once('scripts/db.php');
$conn = db();
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$username_signup = $_POST['username_signup'];
$password_signup = md5($_POST['password_signup']);
$email = $_POST['email'];
$dob = $_POST['dob'];
$typeID = 3;

#profile pic rename
$target_dir = "media/pictures/";
if(basename($_FILES['profile_pic']['name'])!==''){
    $target_file = $target_dir . rand() . basename($_FILES['profile_pic']['name']);
}
else{
    $target_file ='';  
}

$uploadOK = 1;
#pic upload
if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["profile_pic"]["name"]). " has been uploaded.";
  } 
else {
    echo "Sorry, there was an error uploading your file.";
  }
#insertion sql
$signup_sql = 'INSERT INTO user
                (User_ID, Username, First_name, Last_name, User_image, Type_ID, Date_of_birth, Password) 
                VALUES (null,"'.$username_signup.'","'.$firstName.'","'.$lastName.'","'.basename($target_file).'",'.$typeID.',"'.$dob.'","'.$password_signup.'");';
$_SESSION['username'] = $username_signup;
$_SESSION['Type_ID'] = $typeID;



$conn -> query($signup_sql);
$user_id_sql = 'SELECT User_ID from user where Username = "'.$username_signup.'";';
$result_uid = $conn->query($user_id_sql);
$row_uid = $result_uid->fetch_assoc();
$_SESSION['User_ID'] = $row_uid['User_ID'];
$insert_email_sql = 'INSERT INTO `email` (Email_ID, Email, User_ID) VALUES (null, "'.$email.'", '.$_SESSION['User_ID'].');';
$conn->query($insert_email_sql);
if(isset($_SESSION['User_ID'])){
    echo 'Inserted';
    header("Location: user_profile_page.php");
}
else{
    echo 'Signup not succsefull, returning to signup page';
    #header("Location: index.php");
}


?>