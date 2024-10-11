
<!-- Validation Code for Registration -->
<?php
if(isset($_POST['submit'])){

	$name=$_POST['name'];
	$email=$_POST['email'];
	$cemail=$_POST['cemail'];
	$password=$_POST['password'];
	$mobno=$_POST['mobno'];
	$phno=$_POST['phno'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$addr=$_POST['addr'];
	$post=$_POST['post'];
	
	$errornameEmpty=false;
	$erroremailEmpty=false;
	$errorcemailEmpty=false;
	$errorpassEmpty=false;
	$errormobnoEmpty=false;
	$errorstateEmpty=false;
	$errorcityEmpty=false;
	$erroraddrEmpty=false;
	$errorpostEmpty=false;
	$errorphnoEmpty=false;




	$patternname="/^[a-zA-Z]+[a-zA-Z\s]+$/";
	$patternmobno="/^([0-9]{10})$/";
	$patternpass="/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,8}$/";
	$patternpost="/^[0-9]{6}$/";

	

	if(empty($name)||!preg_match($patternname, $name)||$name==''){
		echo "<span class='form-error'>Enter valid name!</span>";
		$errornameEmpty=true;
	}
	
	elseif(empty($email)||$email==''||!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo "<span class='form-error'>Enter valid e-mail!</span>";
		$erroremailEmpty=true;
	}
	// elseif(filter_var($email,FILTER_VALIDATE_EMAIL)){
	// 	$hostname="localhost";
	// 	$username="root";
	// 	$password="";
	// 	$db_name="usedcar";
	// 	$conn=mysqli_connect($hostname,$username,$password,$db_name);
	// 	if(!$conn){
	// 		die("Something went wrong!Try again later!". mysqli_connect_error());
	// 	}else{			

	// 		$emailexist=false;
	// 		$sql="SELECT * FROM users where useremail='$email' ";
	// 		$result=mysqli_query($conn,$sql);
	// 		//echo $result;
	// 		var_dump($result);
	// 		if((mysqli_num_rows($result))> 0){
	// 			while ($row=mysqli_fetch_assoc($result)) {
	// 				echo "id:".$row['userid']." name:".$row['username']."<br>";
	// 			}
	// 			$emailexist=true;

	// 		}
	// 		else{
	// 			$emailexist=false;
	// 		}
	// 		echo $emailexist;
	// 		if($emailexist==true){
	// 			echo "<span class='form-error'>E-mail already exists!</span>";
	// 			$erroremailEmpty=true;
	// 		}
	// 		else{

	// 			$erroremailEmpty=false;
	// 			if($email !=$cemail)
	// 			{
	// 				echo "<span class='form-error'>E-mail does not match!</span>";
	// 			$errorcemailEmpty=true;
	// 			}
	// 			else{
	// 				$errorcemailEmpty=false;
	// 			}
	// 		}
			
	// 	}
		

	// }
	// elseif(empty($cemail)||$cemail==''){
	// 	echo $cemail.$email;
	// 	echo "<span class='form-error'>E-mail does not match!</span>";
	// 	$errorcemailEmpty=true;
	// }
	// elseif (filter_var($cemail,FILTER_VALIDATE_EMAIL)) {
	// 	echo $cemail.$email;
	// 	if($email!=$cemail)
	// 	{
	// 		echo "<span class='form-error'>E-mail does not match!</span>";
	// 		$errorcemailEmpty=true;
	// 	}
	// 	else{
	// 		$errorcemailEmpty=false;

	// 	}

	// }
	elseif(empty($cemail)||$cemail==''||$email!=$cemail||!filter_var($cemail,FILTER_VALIDATE_EMAIL)){
		echo "<span class='form-error'>E-mail does not match!</span>";
		$errorcemailEmpty=true;
	}
	elseif(empty($password)||$password==''||!preg_match($patternpass, $password)){
		// echo "$password";
		echo "<span class='form-error'>Password should contain atleast one digit, one lowercase, one uppercase,one special character and maximum 6-8 characters !!</span>";
		$errorpassEmpty=true;
	}
	
	elseif(empty($mobno)||$mobno==''||!preg_match($patternmobno, $mobno)){
		echo "<span class='form-error'>Enter valid Mobile No!</span>";
		$errormobnoEmpty=true;
	}
	
	elseif(!is_numeric($phno)){
		echo "<span class='form-error'>Enter valid Phone Number!</span>";
		$errorphnoEmpty=true;
	}
	elseif ($state==-1) {
		echo "<span class='form-error'>Select a state!</span>";
		$errorstateEmpty=true;
	}
	elseif ($city==-1) {
		echo "<span class='form-error'>Select a city!</span>";
		$errorcityEmpty=true;
	}
	elseif (empty($addr)||$addr==''||preg_match("/^((\s)+)$/", $addr)) {
		echo "<span class='form-error'>Enter valid address!</span>";
		$erroraddrEmpty=true;
	}
	elseif (empty($post)||$post==''||!preg_match($patternpost, $post)) {
		echo "<span class='form-error'>Enter valid postal code!</span>";
		$errorpostEmpty=true;
	}

	else{
		echo "<span class='form-success'>Success</span>";
	

	
	}

}
else
{
	echo "There was an error";
}




?>

<script>
	// var erroremailexists=false;
	var errorreg=false;
		
	 // $.ajax({
		// 		 	url:"../db/checkexistingemail.php",
		// 		 	type:"post",
		// 		 	data:{
				 		
		// 		 		regemail:email
				 		

		// 		 	},
				 	
		// 		 	success:function(data){
		// 		 		alert(data);
		// 		 		if(data==1){
		// 		 			erroremailexists=true;
		// 		 			$("#regemail").addClass("input-error");
		// 					$("#regemail").focus();
		// 					errorreg=true;

		// 		 		}
		// 		 		else{
		// 		 			erroremailexists=false;
		// 		 		}
		// 		 		console.log(erroremailexists);
		// 		 		}
				 	

		//  })
	
	$("#regname,#regemail,#regcnfmemail,#regpass,#regmobno,#regphno,#regstate,#regcity,#regaddr,#regpost").removeClass("input-error");
	var errornameEmpty="<?php echo($errornameEmpty) ?>";
	var erroremailEmpty="<?php echo($erroremailEmpty) ?>";
	var errorcemailEmpty="<?php echo($errorcemailEmpty) ?>";
	var errorpassEmpty="<?php echo($errorpassEmpty) ?>";
	var errormobnoEmpty="<?php echo($errormobnoEmpty) ?>";
	var errorphnoEmpty="<?php echo($errorphnoEmpty) ?>";
	var errorstateEmpty="<?php echo($errorstateEmpty) ?>";
	var errorcityEmpty="<?php echo($errorcityEmpty) ?>";
	var erroraddrEmpty="<?php echo($erroraddrEmpty) ?>";
	var errorpostEmpty="<?php echo($errorpostEmpty) ?>";


	var name="<?php echo($name) ?>";
	var email="<?php echo($email) ?>";
	var cemail="<?php echo($cemail) ?>";
	var password="<?php echo($password) ?>";
	var mobno="<?php echo($mobno) ?>";
	var phno="<?php echo($phno) ?>";
	var state="<?php echo($state) ?>";
	var city="<?php echo($city) ?>";
	var addr="<?php echo($addr) ?>";
	var post="<?php echo($post) ?>";





	

	if(errornameEmpty==true){
		$("#regname").focus();
		$("#regname").addClass("input-error");
		errorreg=true;
		
	}
	else if(erroremailEmpty==true){
		$("#regemail").addClass("input-error");
		$("#regemail").focus();
		errorreg=true;
		
	}
	// else if(erroremailexists==true){
	// 	$("#regemail").addClass("input-error");
	// 	$("#regemail").focus();
	// 	errorreg=true;
	// }
	
	else if(errorcemailEmpty==true){
		$("#regcnfmemail").addClass("input-error");
		$("#regcnfmemail").focus();
		errorreg=true;
	}
	else if(errorpassEmpty==true){
		$("#regpass").addClass("input-error");
		$("#regpass").focus();
		errorreg=true;
	}
	else if(errormobnoEmpty==true){
		$("#regmobno").addClass("input-error");
		$("#regmobno").focus();
		errorreg=true;
	}
	else if(errorphnoEmpty==true){
		$("#regphno").addClass("input-error");
		$("#regphno").focus();
		errorreg=true;
	}
	else if(errorstateEmpty==true){
		$("#regstate").addClass("input-error");
		$("#regstate").focus();
		errorreg=true;
	}
	else if(errorstateEmpty==true){
		$("#regstate").addClass("input-error");
		$("#regstate").focus();
		errorreg=true;
	}
	else if(errorcityEmpty==true){
		$("#regcity").addClass("input-error");
		$("#regcity").focus();
		errorreg=true;
	}
	else if(erroraddrEmpty==true){
		$("#regaddr").addClass("input-error");
		$("#regaddr").focus();
		errorreg=true;
	}
	else if(errorpostEmpty==true){
		$("#regpost").addClass("input-error");
		$("#regpost").focus();
		errorreg=true;
		// alert("post:"+errorpostEmpty);
		// alert(errorpostEmpty);
	}
	else{
		errorreg=false;
		//alert(errorreg);
		// $("#regname,#regemail,#regcnfmemail,#regpass,#regmobno,#regphno,#regstate,#regcity,#regaddr,#regpost").val("");
			//alert(erroremailexists);
		 //dbConnection
		// if(erroremailexists!=true)
		// {
				 $.ajax({
				 	url:'../db/reginsert.php',
				 	type:'post',
				 	data:{
				 		regerror:errorreg,
				 		regname:name,
				 		regemail:email,
				 		regcemail:cemail,
				 		regpass:password,
				 		regmobno:mobno,
				 		regphno:phno,
				 		regstate:state,
				 		regcity:city,
				 		regaddr:addr,
				 		regpost:post

				 	},
				 	
				 	success:function(data){
				 		//alert(data);
				 		if(data!=1){
				 			

				 			$("#regemail").addClass("input-error");
				 			//$("#regemail").addClass("form-error");
							$("#regemail").focus();
							// $("#regemail").val('Email already exists');
							$(".form-message").text('Email already exists');
							$(".form-message").addClass("form-error");
							errorreg=true;
				 		}
				 		else{
				 			 window.location="../view/home.php";
				 		}
				 		// alert(data);
				 		// window.location="../view/home.php";
				 		}
				 	

		 })
		
		// window.location="../view/home.php";
		
	// }
}
	// function dbConnection()
	// {
	// alert("dbconnection");
	// 	window.location="../db/dbconnection.php";
	// }
</script>	