<?php
	$hostname="localhost";
	$username="root";
	$password="root";
	$db_name="usedcar";
	$conn=mysqli_connect($hostname,$username,$password,$db_name);
	if(!$conn){
		die("Something went wrong!Try again later!". mysqli_connect_error());
	}


?>
