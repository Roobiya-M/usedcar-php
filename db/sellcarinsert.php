<?php
session_start();
include "../db/dbconn.php";
$errorsell=$_POST['errorsell'];
if($errorsell=="false"){
	$city=$_POST['city'];
		$pincode=$_POST['pincode'];
		$mfgyear=$_POST['mfgyear'];
		$make=$_POST['make'];
		$model=$_POST['model'];
		$kms=$_POST['kms'];
		$ownersno=$_POST['ownersno'];
		$expprize=$_POST['expprize'];
		$terms=$_POST['terms'];
		$userid=$_SESSION['userid'];
		if(!$conn){
			die("Connecion Successfull".mysqli_connect_error());
		}
		else{
			$sqlinsert="INSERT INTO sellcar(city,pincode,mfgyear,make,model,kms,noofowners,expprize,userid) VALUES('$city','$pincode','$mfgyear','$make','$model','$kms','$ownersno','$expprize','$userid')";
			if(mysqli_query($conn,$sqlinsert)){
				$lastid=mysqli_insert_id($conn);
				$_SESSION['carid']=$lastid;
				echo true;
			}else{
				echo false;
			}
		}
		
}else{
	echo "error";
}