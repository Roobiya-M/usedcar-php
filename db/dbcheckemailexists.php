<?php
session_start();
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$userid=$_SESSION['userid'];
	$erroremail=false;
	include '../db/dbconn.php';
	if(!$conn){
		die("Something went wrong..!".mysqli_connect_error());
	}else{
		$sql="SELECT * FROM users WHERE userid!='$userid' AND useremail='$email'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			while ($row=mysqli_fetch_assoc($result)) {
				// echo "<span class='form-error'>Email Is already taken.Please try with another EmailId</span>";

				$erroremail=true;
				echo "1";
			}
		}else{
			$erroremail=false;
			echo "0";
			// echo "<span class='form-error'>".$erroremail."</span>";;
		}
	}
}
//echo "<span class='form-error'>Emsail exists or not!</span>";
?>

