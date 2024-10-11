<?php
session_start();
include '../db/dbconn.php';
$erroredit=$_POST['erroreditcar'];
if($erroredit=="false"){
		$city=$_POST['city'];
		$pincode=$_POST['pincode'];
		$mfgyear=$_POST['mfgyear'];
		$make=$_POST['make'];
		$model=$_POST['model'];
		$kms=$_POST['kms'];
		$ownersno=$_POST['ownersno'];
		$expprize=$_POST['expprize'];
		//$terms=$_POST['terms'];
		//$userid=$_SESSION['userid'];
		$regNo=$_POST['regNo'];
		$fuel=$_POST['fuel'];
		$colour=$_POST['colour'];
		$insdate=$_POST['insdate'];
		$message=$_POST['message'];
		// $imgsrc=$_POST['imgsrc'];
		// $newimgloc=$_POST['newimgloc'];
		// $length=$_POST['length'];
		// $filename=$_POST['filename'];
		//$newimgloc=$_POST['newimgloc']."/".$filename;
		$carid=$_SESSION['carid'];
		$uploadid=$_SESSION['uploadid'];
		//echo $carid;
		if (!$conn) {
			die("Something went wrong..!".mysqli_connect_error());
		}else{
			$sql="UPDATE sellcar SET city='$city',pincode='$pincode',mfgyear='$mfgyear',make='$make',model='$model',kms='$kms',noofowners='$ownersno',expprize='$expprize' WHERE carid='$carid'";
			if(mysqli_query($conn,$sql)){
				//updated the table sellcar.now update upload table
				$sqlupd="UPDATE upload SET fuel='$fuel',colour='$colour',regNo='$regNo',insurance='$insdate',message='$message' WHERE uploadid='$uploadid' AND carid='$carid'";



				// if($length==0){				
				// 	$sqlupd="UPDATE upload SET fuel='$fuel',colour='$colour',regNo='$regNo',insurance='$insdate',message='$message' WHERE uploadid='$uploadid' AND carid='$carid'";
				// }else{
				// 	//new image has to be uploaded
				// 	echo $newimgloc;
				// 	$destimg='../upload/'.uniqid('',true).".".$filename;
				// 	move_uploaded_file($newimgloc, $destimg);
				// 	$sqlupd="UPDATE upload SET carimg='$destimg',fuel='$fuel',colour='$colour',regNo='$regNo',insurance='$insdate',message='$message' WHERE uploadid='$uploadid' AND carid='$carid'";
				// 	//echo(var_dump($destimg));
				// }
				if(mysqli_query($conn,$sqlupd)){
					//echo "updated both sellcar and upload";
					//header('location:../view/myown.php');
					echo true;
				}
				else{
					echo false;
				// 	echo "Something went wrong".mysqli_error($conn);
				// header('location:../view/editcar.php');
				}
			}else{
				echo false;
				// echo "Something went wrong".mysqli_error($conn);
				// header('location:../view/editcar.php');
			}
		}


}