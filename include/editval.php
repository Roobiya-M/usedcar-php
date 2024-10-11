<?php
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$mobno=$_POST['mobno'];
	$phno=$_POST['phno'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$addr=$_POST['addr'];
	$post=$_POST['post'];
	
	$errornameEmpty=false;
	$erroremailEmpty=false;
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
	elseif(empty($password)||$password==''||!preg_match($patternpass, $password)){
		// echo "$password";
		echo "<span class='form-error'>Password should contain atleast one digit, one lowercase, one uppercase,one special character and maximum 6-8 characters !!</span>";
		$errorpassEmpty=true;
	}	
	elseif(empty($email)||$email==''||!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo "<span class='form-error'>Enter valid e-mail!</span>";
		$erroremailEmpty=true;
	}
	else{
		echo "<span class='form-success'>Success</span>";
	

	
	}
}else{
	echo "There was an error";
}
?>
<script>
	// var erroremailexists=false;
	var errorreg=false;
		
	 


	
	$("#regname,#txtemail,#txtpass,#regmobno,#regphno,#regstate,#regcity,#regaddr,#regpost").removeClass("input-error");
	var errornameEmpty="<?php echo($errornameEmpty) ?>";
	var erroremailEmpty="<?php echo($erroremailEmpty) ?>";
	//var errorcemailEmpty="<?php($errorcemailEmpty) ?>";
	var errorpassEmpty="<?php echo($errorpassEmpty) ?>";
	var errormobnoEmpty="<?php echo($errormobnoEmpty) ?>";
	var errorphnoEmpty="<?php echo($errorphnoEmpty) ?>";
	var errorstateEmpty="<?php echo($errorstateEmpty) ?>";
	var errorcityEmpty="<?php echo($errorcityEmpty) ?>";
	var erroraddrEmpty="<?php echo($erroraddrEmpty) ?>";
	var errorpostEmpty="<?php echo($errorpostEmpty) ?>";


	var name="<?php echo($name) ?>";
	var email="<?php echo($email) ?>";
	//var cemail="<?php ($cemail) ?>";
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
		$("#txtemail").addClass("input-error");
		$("#txtemail").focus();
		errorreg=true;
		
	}
	else if(errorpassEmpty==true){
		$("#txtpass").addClass("input-error");
		$("#txtpass").focus();
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
		
	}
	else{
		errorreg=false;
		$.ajax({
			url:'../db/updateprofile.php',
			type:'post',
			data:{
				editerror:errorreg,
				name:name,
		 		email:email,
		 		//regcemail:cemail,
		 		pass:password,
		 		mobno:mobno,
		 		phno:phno,
		 		state:state,
		 		city:city,
		 		addr:addr,
		 		post:post
			},
			success:function(data){
				console.log(data);
				if(data!=1){
					$(".form-message").text("Something went wrong.Please try again later..!");
					errorreg=true;
				}else{
					window.location='../view/login.php';
				}
			}
		})
	
}
	
</script>