<?php 
function db()
{ 
	$conn = new mysqli("localhost", "root", "", "tinmar_db");  
	return $conn;
}

?>