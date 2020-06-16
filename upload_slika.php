<?php 
require('scripts/db.php');
$conn = db();
session_start();
$objectid = $_POST['object_id'];
mkdir("media/object_images/");
$target_dir= "media/object_images/";
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
    if($_FILES['files']['error'][$key] == 0){
    $file_name = $_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext = pathinfo($file_name);
    $target_name=rand();
    $target_file = $target_dir .$target_name.'.'.$ext['extension'];
        if(!file_exists($target_dir.$target_name)){
            $sql_upload = 'INSERT INTO object_images (`Picture_ID`, `Picture`, `Object_ID`) VALUES (NULL,"'.$target_name.'.'.$ext['extension'].'",'.$objectid.');';
            if(move_uploaded_file($_FILES["files"]["tmp_name"][$key],$target_file) && $conn->query($sql_upload)){
                $_SESSION['upload']=1;
                header('Location:object_info.php?objid='.$objectid.'');
            }

        }
    }
    else{
        $_SESSION['error']= 1;
        header('Location:object_info.php?objid='.$objectid.'');
    }


}


?>