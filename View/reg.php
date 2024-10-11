<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/stylereg.css">
		<script src="../jquery/jquery.js"></script>
	<script src="../jquery/jsreg.js"></script>
</head>
<body>
	<div class="container">
		<h1 style="text-align: center">USED CAR</h1><br><br>
			<form method="post" action="home.php">
			<table align="center">
				<tr><td><label>Register now?</label></td></tr>
				<tr></tr><tr></tr>
				<tr></tr><tr></tr>
				<tr>
					<td><label>Name*:</label></td>
					<td><input type="text" name="regname" id="regname">
					</td>
				</tr>
				<tr>
					<td><label>Email*:</label></td>
					<td><input type="text" name="regemail" id="regemail">
						</td>
				</tr>
				<tr>
					<td><label>Confirm Email*:</label></td>
					<td><input type="text" name="regcnfmemail" id="regcnfmemail">
						</td>
				</tr>
				<tr>
					<td><label>Password*:</label></td>
					<td><input type="Password" name="regpass" id="regpass"></td>
				</tr>
				<tr>
					<td><label>Mobile Number*:</label></td>
					<td><input type="text" name="regmobno" id="regmobno"></td>
				</tr>
				<tr>
					<td><label>Phone No:</label></td>
					<td><input type="text" name="regphno" id="regphno"></td>
				</tr>
				<tr>
					<td><label>State*:</label></td>
					<td>
					<select name="regstate" id="regstate">
						<option value="-1">Select State</option>
						<option value="Kerala">Kerala</option>
						<option value="Karnataka">Karnataka</option>
						<option value="TamilNadu">TamilNadu</option>
						<option value="Uttar Pradesh">Uttar Pradesh</option>
						<option value="Maharashtra">Maharashtra</option>
						<option value="MadhyaPradesh">MadhyaPradesh</option>
						<option value="Gujarat">Gujarat</option>
					</select>
				</td>
				</tr>
				<tr>
					<td><label>City*:</label></td>
					<td><select name="regcity" id="regcity">
						<option value="-1">Select City</option>
						<option value="Cochin">Cochin</option>
						<option value="Banglore">Banglore</option>
						<option value="Chennai">Chennai</option>
						<option value="Delhi">Delhi</option>
						<option value="Pune">Pune</option>
						<option value="Mumbai">Mumbai</option>
						<option value="Jaipur">Jaipur</option>
					</select></td>
				</tr>
				<tr>
					<td><label>Street/Address*:</label></td>
					<td>
						<textarea name="regaddr" id="regaddr"></textarea></td>
				</tr>
				<tr>
					<td><label>Postal Code*:</label></td>
					<td><input type="text" name="regpost" id="regpost"></td>
				</tr>
				<tr>
					
					<td><input type="submit" name="regsubmit" value="Submit" id="submit"></td>
				</tr>
				<tr>
					<td colspan="2"><p class="form-message"></p></td>
				</tr>
				
			</table>
			</form>
	</div>
</body>
</html>