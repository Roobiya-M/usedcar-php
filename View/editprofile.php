<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/stylereg.css">
		<script src="../jquery/jquery.js"></script>
		<style>
			.navbar a{
				margin:10px;
			}

		</style>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#password").click(function(){
					// $("#txtpass").css("display","block");
					// $("#txtemail").css("display","none");
					$("#txtpass").show();
					$("#txtemail").hide();
				})
				$("#email").click(function(){
					$("#txtpass").hide();
					$("#txtemail").show();
					// $("#txtpass").css("display","none");
					// $("#txtemail").css("display","block");
				})
				$("form").submit(function(event){
					event.preventDefault();
					var name=$("#regname").val();
					var mobno=$("#regmobno").val();
					var phno=$("#regphno").val();
					var state=$("#regstate").val();
					var city=$("#regcity").val();
					var addr=$("#regaddr").val();
					var post=$("#regpost").val();
					var password=$("#txtpass").val();
					var email=$("#txtemail").val();
					var submit=$("#submit").val();
					

					if(email!=''){
						// $(".email-message").load("../db/dbcheckemailexists.php",{
						// 	email:email,
						// 	submit:submit

						// })
						$.ajax({
							url:'../db/dbcheckemailexists.php',
							type:'post',
							data:{
								email:email,
								submit:submit
							},
							success:function(data){
								console.log(data);
								if(data==1){
									$(".form-message").text("");
									$(".email-message").addClass("form-error");
									$("#txtemail").addClass("input-error");
									$("#txtemail").focus();
									$(".email-message").text("Email Is already taken.Please try with another EmailId");
								}else if(data==0){
									$(".email-message").removeClass("form-error");
									$("#txtemail").removeClass("input-error");
									//$("#txtemail").focus();
									$(".email-message").text("");
									$(".form-message").text("");
									$(".form-message").load("../include/editval.php",{
											name:name,
											email:email,
											password:password,
											mobno:mobno,
											phno:phno,
											state:state,
											city:city,
											addr:addr,
											post:post,
											submit:submit
									})
								}
							}
						})
						
					}
					else{
						$(".form-message").text("Enter valid Email Id!");
									$(".form-message").addClass("form-error");
									$("#txtemail").addClass("input-error");
									$("#txtemail").focus();
					}
					

				})

			})
		</script>
</head>
<body>
	<div class="container">
		<h1 style="text-align: center">USED CAR</h1><br><br>
		<div class="navbar">
			<a href="home.php"style="color: lightgreen;">Home</a>
			<a href="myown.php"style="color: lightgreen;">My used car listing </a>
			<a href="sellcar.php"style="color: lightgreen;">Sell your car</a>
			<a href="enquiry.php"style="color: lightgreen;">Enquiries</a>
			<a href="editprofile.php"style="color: lightgreen;">Edit Profile</a>
			<a href="view.php"style="color: lightgreen;">View Full Listing</a>
			<a href="logout.php"style="color: lightgreen;">Logout</a>
			<br><br>			
		</div>
		<?php
		session_start();
		$userid=$_SESSION['userid'];
		include '../db/dbconn.php';
		if(!$conn){
			die("Something went wrong.Please try again...!".mysqli_connect_error());
		}
		else{
			$sql="SELECT * FROM users WHERE userid='$userid'";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
					$state=$row['userstate'];
					$city=$row['usercity'];?>
					<form method="post" action="login.php">
			<table align="center">
				<tr><td><label>Register now?</label></td></tr>
				<tr></tr><tr></tr>
				<tr></tr><tr></tr>
				<tr>
					<td><label>Name*:</label></td>
					<td><input type="text" name="regname" id="regname" value="<?php echo($row['username'])?>">
					</td>
				</tr>
				<tr>
					<td><label>Mobile Number*:</label></td>
					<td><input type="text" name="regmobno" id="regmobno" value="<?php echo($row['usermobno'])?>"></td>
				</tr>
				<tr>
					<td><label>Phone No:</label></td>
					<td><input type="text" name="regphno" id="regphno" value="<?php echo($row['userphno'])?>"></td>
				</tr>
				<tr>
					<td><label>State*:</label></td>
					<td>
					<select name="regstate" id="regstate">
						<option value="-1">Select State</option>
						<option value="Kerala" <?php if($state=="Kerala")echo 'selected=="selected"';?>>Kerala</option>
						<option value="Karnataka" <?php if($state=="Karnataka")echo 'selected=="selected"';?>>Karnataka</option>
						<option value="TamilNadu" <?php if($state=="TamilNadu")echo 'selected=="selected"';?>>TamilNadu</option>
						<option value="Uttar Pradesh" <?php if($state=="Uttar Pradesh")echo 'selected=="selected"';?>>Uttar Pradesh</option>
						<option value="Maharashtra" <?php if($state=="Maharashtra")echo 'selected=="selected"';?>>Maharashtra</option>
						<option value="MadhyaPradesh" <?php if($state=="MadhyaPradesh")echo 'selected=="selected"';?>>MadhyaPradesh</option>
						<option value="Gujarat" <?php if($state=="Gujarat")echo 'selected=="selected"';?>>Gujarat</option>
					</select>
				</td>
				</tr>
				<tr>
					<td><label>City*:</label></td>
					<td><select name="regcity" id="regcity">
						<option value="-1">Select City</option>
						<option value="Cochin" <?php if($city=="Cochin")echo 'selected=="selected"';?>>Cochin</option>
						<option value="Banglore" <?php if($city=="Banglore")echo 'selected=="selected"';?>>Banglore</option>
						<option value="Chennai" <?php if($city=="Chennai")echo 'selected=="selected"';?>>Chennai</option>
						<option value="Delhi" <?php if($city=="Delhi")echo 'selected=="selected"';?>>Delhi</option>
						<option value="Pune" <?php if($city=="Pune")echo 'selected=="selected"';?>>Pune</option>
						<option value="Mumbai" <?php if($city=="Mumbai")echo 'selected=="selected"';?>>Mumbai</option>
						<option value="Jaipur" <?php if($city=="Jaipur")echo 'selected=="selected"';?>>Jaipur</option>
					</select></td>
				</tr>
				<tr>
					<td><label>Street/Address*:</label></td>
					<td>
						<textarea name="regaddr" id="regaddr"><?php echo($row['userstreet'])?></textarea></td>
				</tr>
				<tr>
					<td><label>Postal Code*:</label></td>
					<td><input type="text" name="regpost" id="regpost" value="<?php echo($row['userpost'])?>"></td>
				</tr>
				<tr></tr><tr></tr>
				<tr></tr><tr></tr>
				<tr><td><label>Your Login Information</label></td></tr>
				<tr></tr><tr></tr>
				<tr></tr><tr></tr>
				<tr>
					<td colspan="2">
						<input type="radio" name="logininfo" id="password" value="password">
						<label>Password</label>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="password" name="txtpass" id="txtpass" style="display: none;" value="<?php echo($row['userpass'])?>">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="radio" name="logininfo" id="email" value="email" >
						<label>Email ID</label>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="txtemail" id="txtemail" style="display: none;" value="<?php echo($row['useremail'])?>">
					</td>
				</tr>
				<tr>
					
					<td><input type="submit" name="submit" value="Submit" id="submit"></td>
				</tr>
				<tr>
					<td colspan="2"><p class="form-message"></p></td>
				</tr>
					<tr>
					<td colspan="2"><p class="email-message"></p></td>
				</tr>
				<!-- <tr>
					<td colspan="2"><input type="text" name="txtemailerror" id="txtemailerror" hidden></td>
				</tr> -->
			</table>
			</form>
			<?php	}
			}else{
				header('location:../view/login.php');
				exit();
			}
		}


		?>
		
	</div>
</body>
</html>