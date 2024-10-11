<?php
session_start();
if($_POST['editerror']=="false"){
	include '../db/dbconn.php';
	$name=$_POST['name'];
	$email=$_POST['email'];
	$cemail=$_POST['email'];
	$pass=$_POST['pass'];
	$mobno=$_POST['mobno'];
	$phno=$_POST['phno'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$addr=$_POST['addr'];
	$post=$_POST['post'];
	$userid=$_SESSION['userid'];
	// echo var_dump($mobno);
	// echo var_dump($post);
	if(!$conn){
		die("Something went wrong.Please Try again later..!".mysqli_connect_error());
	}else{
		$sql="UPDATE users SET username='$name',useremail='$email',usercemail='$cemail',userpass='$pass',usermobno='$mobno',userphno='$phno',userstate='$state',usercity='$city',userstreet='$addr',userpost='$post' WHERE userid='$userid'";
		//$sql="UPDATE users SET usermobno='$mobno' WHERE userid='$userid'";
		if(mysqli_query($conn,$sql)){
			//echo "Updated table users";
			//echo "$userid"."$name";
			$sqll="UPDATE enquiry SET name='$name',number='$mobno' WHERE buyerid='$userid'";
			if(mysqli_query($conn,$sqll))
			{
				echo true;
			}
			else{
				echo false;
			}
			
		}
		else{
			//echo "Error".mysqli_error($conn);
			echo false;
		}
	}

}