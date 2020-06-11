<?php
require_once('scripts/db.php');
$conn = db();

/*Login backend*/
/*
$username = $_POST['username'];
$pass = $_POST['pass'];
$sql_user = 'SELECT * from `user` where Username="'.$username.'" and Password="'.$pass.'";';
$result = $conn->query($sql_user);
*/
session_start();
/*
$_SESSION['error_mess'] = '<div class="alert alert-danger alert-dismissable fade show" role="alert">
Krivi Username ili password
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button></div>';
if($result && $result->num_rows==1){
    $row = $result->fetch_assoc();
    $_SESSION['username']=$username;
    $_SESSION['Type_ID']=$row['Type_ID'];
    $_SESSION['User_ID'] = $row['User_ID'];*/
    switch($_SESSION['Type_ID']){
        case 2: header("Location: host_profile_page.php");break;
        case 3: header("Location: user_profile_page.php");break;
        default : header("Location: homepage.php");break;
    }/*
}
else{
    //header("Location: index.php"); 
}*/

?>