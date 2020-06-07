<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    require_once('scripts/db.php');
    $conn = db();
$locid = $_GET['locid'];   
if(isset($_POST['address']) && $_POST['address']!= ''){
    $sql_update_address = 'UPDATE `location` SET `Street_address`="'.$_POST['address'].'" WHERE `Location_ID` = '.$locid.';';
    echo $sql_update_address;
    $sql_update_address='';
    echo 'izvrsavam query';

}

?>
</head>
<body>
    <form name="edit" method="post" action="?locid=<?php echo $locid?>">
    <input type ="text" name="address">
    <input type="submit" value="UPDATE">
    </form>
</body>
</html>
