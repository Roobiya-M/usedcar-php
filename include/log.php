<?php
session_start();
include "../db/dbconn.php";
if(isset($_POST['login'])){
	if(isset($_POST['email'])&&isset($_POST['password'])){
		function validate($data){
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		$email=validate($_POST['email']);
		$password=validate($_POST['password']);
		if(empty($email)){
			header("location: ../view/home.php?error=E-mail is required");
			exit();
		}else if (empty($password)) {
			header("location: ../view/home.php?error=Password  is required");
			exit();
		}else{
			$sql="SELECT * FROM users WHERE useremail='$email' AND userpass='$password'";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)===1){
				$row=mysqli_fetch_assoc($result);
				if($row['useremail']===$email && $row['userpass']===$password){
					$_SESSION['username']=$row['username'];
					$_SESSION['useremail']=$row['useremail'];
					$_SESSION['userid']=$row['userid'];
					$_SESSION['userpass']=$row['userpass'];
					$_SESSION['usermobno']=$row['usermobno'];
					header("location: ../view/login.php");
					exit();
				}else{
					header("location: ../view/home.php?error=Incorrect E-mail or Password");
					exit();
				}
				
				
			}
			else{
				header("location: ../view/home.php?error=Incorrect E-mail or Password");
			exit();
			}
		}
	}else{
		header("location: ../view/home.php");
		exit();
	}

}
?>
