<?php
session_start();
if(isset($_POST['submit'])){
	$img=$_FILES['photo'];
	$fuel=$_POST['fuel'];
	$colour=$_POST['colour'];
	$regNo=$_POST['regNo'];
	$insdate=$_POST['insurance'];
	$message=$_POST['ownermsg'];
	$carid=$_SESSION['carid'];
	var_dump($img);
	$imgname=$img['name'];
	$imgpath=$img['tmp_name'];
	$imgerror=$img['error'];
	if(trim($regNo)==""){
		echo "Enter valid Registration No";
		header('location:../view/afposting.php');
		exit();
	}
	if(trim($message)==""){
		echo "Please leave a message";
		header('location:../view/afposting.php');
		exit();
	}
	if($imgerror==0){
		$destimg='../upload/'.uniqid('',true).".".$imgname;
		move_uploaded_file($imgpath, $destimg);
		var_dump($destimg);
		include '../db/dbconn.php';
		if(!$conn){
			die("Something went wrong!..".mysqli_connect_error());
		}
		else{
			$sqlinsert="INSERT INTO upload(carimg,fuel,colour,regNo,insurance,message,carid) VALUES('$destimg','$fuel','$colour','$regNo','$insdate','$message','$carid')";
			if(mysqli_query($conn,$sqlinsert)){
				
				header('location:../view/login.php');
				unset($_SESSION['carid']);
			}else{
				echo "Something went wrong! Try again..!";
				header('location:../view/afposting.php');
			}
		}
	}else{
		echo "There was an error in uploading your file..!";
		header('location:../view/afposting.php');

	}	
	// var_dump($date);

}else
{
	echo "Something went wrong!...";
	header('location:../view/afposting.php');
}
