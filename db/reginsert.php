<?php
$regerror=$_POST['regerror'];
if($regerror=="false")
{

	$hostname="localhost";
	$username="root";
	$password="";
	$db_name="usedcar";

		$name=$_POST['regname'];
		$email=$_POST['regemail'];
		$cemail=$_POST['regcemail'];
		$pass=$_POST['regpass'];
		$mobno=$_POST['regmobno'];
		$phno=$_POST['regphno'];
		$state=$_POST['regstate'];
		$city=$_POST['regcity'];
		$addr=$_POST['regaddr'];
		$post=$_POST['regpost'];



	$conn=mysqli_connect($hostname,$username,$password,$db_name);
	if(!$conn){
		die("Something went wrong!Try again later!". mysqli_connect_error());
	}else{
		// echo($name.$email.$cemail.$pass.$mobno.$phno.$state.$city.$addr.$post);
		// var_dump($name);
		// var_dump($email);
		// var_dump($mobno);



		$emailexist=false;
		$sql="SELECT * FROM users where useremail='$email' ";
		$result=mysqli_query($conn,$sql);
		//echo $result;
		//var_dump($result);
		if((mysqli_num_rows($result))> 0){
			// while ($row=mysqli_fetch_assoc($result)) {
			// 	echo "id:".$row['userid']." name:".$row['username']."<br>";
			// }

			 $emailexist=true;

		}
		else{
			$emailexist=false;
		}
		//echo "Email exists is".$emailexist;
		if($emailexist!=1){

			$newrecordcreated=true;
			$sqlinsert="INSERT INTO users (username,useremail,usercemail,userpass,usermobno,userphno,userstate,usercity,userstreet,userpost) VALUES('$name','$email','$cemail','$pass','$mobno','$phno','$state','$city','$addr','$post')";
			if(mysqli_query($conn,$sqlinsert)){
				 $newrecordcreated=true;
			}else{
				$newrecordcreated=false;				
			}
			echo $newrecordcreated;
		}
		else{
			$emaildiff=false;
			echo $emaildiff;
		}



















		// $sql="INSERT INTO users (username,useremail,usercemail,userpass,usermobno,userphno,userstate,usercity,userstreet,userpost) VALUES('$name','$email','$cemail','$pass','$mobno','$phno','$state','$city','$addr','$post')";
		// if(mysqli_query($conn,$sql)){
		// 	echo "New Record Created";
		// }else{
		// 	echo "Error".mysqli_error($conn);
		// }
	}

}
else{
	echo "error";
}

	

// if(!$regerror)
// {
// echo "dbconnectionphp";
// }
// else
// {
	
// 	echo $regerror;
// }


?>