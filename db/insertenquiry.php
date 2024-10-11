<?php
if(isset($_POST['submit'])){
	$buyerid=$_POST['buyerid'];
	$name=$_POST['name'];
	$number=$_POST['number'];
	$message=$_POST['message'];
	$carid=$_POST['carid'];
	$sellerid=$_POST['sellerid'];
	
	include '../db/dbconn.php';
	if(!$conn){
		die("Something went wrong..!".mysqli_connect_error);
	}
	else{
		$sql="INSERT INTO enquiry(buyerid,name,number,message,carid,sellerid) VALUES('$buyerid','$name','$number','$message','$carid','$sellerid')";
		if(mysqli_query($conn,$sql)){
			echo true;
		}else{
			echo false;
		}
	}
}