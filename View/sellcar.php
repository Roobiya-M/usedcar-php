<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/stylereg.css">
		<script src="../jquery/jquery.js"></script>
		<script>
			$(document).ready(function(){
	
				$("form").submit(function(event){
					event.preventDefault();
					var city=$("#city").val();
					var pincode=$("#pincode").val();
					var mfgyear=$("#mfgyear").val();
					var make=$("#make").val();
					var model=$("#model").val();
					var kms=$("#kms").val();
					var ownernos=$("#ownernos").val();
					var expprize=$("#expprize").val();
					// var terms=$("#terms").val();
					// console.log(terms);
					if(document.getElementById('terms').checked==true){
						var terms=1;
					}
					else{
						var terms=-1;
					}
					console.log(terms); 	 	
					var submit=$("#submit").val();
					$(".form-message").load("../include/sellcarval.php",{
						//  lhs:postname rhs:the value we got on top from input fields
						city:city,
						pincode:pincode,
						mfgyear:mfgyear,
						make:make,
						model:model,
						kms:kms,
						ownernos:ownernos,
						expprize:expprize,
						terms:terms,
						submit:submit

					});
					
					
				})
				
				

});
		</script>
		<style>
			.navbar a{
				margin:10px;
			}
		</style>
		
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
			</div>
			<br><br>
			<h4 style="text-align: center;color:magenta;">Just fill your information and Get started</h4>
			<form method="POST" action="../include/sellcarval.php">
				<table align="center">
					<tr>
						<td><label>City*</label></td>
						<td><input type="text" name="city" id="city"></td>
					</tr>
					<tr>
						<td><label>Pincode*</label></td>
						<td><input type="text" name="pincode" id="pincode"></td>
					</tr>
				</table>
				<h4 style="text-align: center;color:red;">CAR INFORMATION</h4>
				<table align="center">
					<tr>
						<td><label>MFG Year*</label></td>
						<td><input type="text" name="mfgyear" id="mfgyear"></td>
					</tr>
					<tr>
						<td><label>Make*</label></td>
						<td><select name="make" id="make">
						<option value="-1">Select</option>
						<option value="Tata">Tata</option>
						<option value="Maruti">Maruti</option>					
					</select></td>
					</tr>
					<tr>
					<td><label>Model*</label></td>
						<td><input type="text" name="model" id="model"></td>
					</tr>
					<tr>
						<td><label>KMs Driven*</label></td>
						<td><input type="text" name="kms" id="kms"></td>
					</tr>
					<tr>
						<td><label>No of Owners*</label></td>
						<td><input type="text" name="ownernos" id="ownernos"></td>
					</tr>
					<tr>
						<td><label>Expected Prize*</label></td>
						<td><input type="text" name="expprize" id="expprize"></td>
					</tr>
				</table>
				<h4 style="text-align: center;color:red;">CONTACT INFORMATION</h4>
					<table align="center">
					<tr>
						<td><label>Name</label></td>
						<td><input type="text" name="name" value="<?php echo($_SESSION['username']); ?>" readonly></td>
					</tr>
					<tr>
						<td><label>Mobile Number</label></td>
						<td><input type="text" name="mobno" value="<?php echo($_SESSION['usermobno']); ?>" readonly></td>
					</tr>
					<tr>
						<td><label>Email ID</label></td>
						<td><input type="text" name="email" value="<?php echo($_SESSION['useremail']); ?>" readonly></td>
					</tr>
					<tr>
						<td colspan="2"><input type="checkbox" name="terms" id="terms"><label>I agree with the terms and conditions</label></td>
					</tr>
					<tr><td><input type="submit" name="postlist" value="POST LISTING" id="submit"></td></tr>
					<tr>
					<td colspan="2"><p class="form-message"></p></td>
					</tr>
				</table>
				</form>
		
	</div>
</body>
</html>
