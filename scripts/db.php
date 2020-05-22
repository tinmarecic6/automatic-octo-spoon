<?php 
function db()
{ 
	$conn = new mysqli("localhost", "root", "", "tin_mar_db");  
	return $conn;
}

?>