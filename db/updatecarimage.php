<?php
session_start();
if($_FILES["image"]["name"]!=''){
		$carid=$_SESSION['carid'];
		$uploadid=$_SESSION['uploadid'];
	$test=var_dump($_FILES["image"]);
	//echo($test);
	$imgname=$_FILES['image']['name'];
	$destimage='../upload/'.uniqid('',true).".".$imgname;
	//echo $destimage;
	move_uploaded_file($_FILES['image']['tmp_name'], $destimage);
	include '../db/dbconn.php';
	if(!$conn){
		die("Something went wrong..!".mysqli_connect_error());
	}else{
		$sqlupd="UPDATE upload SET carimg='$destimage' WHERE uploadid='$uploadid' AND carid='$carid'";
		if(mysqli_query($conn,$sqlupd)){
			echo true;
		}
		else{
			echo false;
		}
	}
}