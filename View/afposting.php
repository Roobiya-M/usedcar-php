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
			#tblpost label{
				color: magenta;
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
			<form action="../db/afpostinsert.php" method="POST" enctype="multipart/form-data">
				<table align="center" id="tblpost">
					<tr>
						<td>
							<label >Upload image</label>
							<input type="file" name="photo" style="color: magenta;" required>
					</td>
					</tr>
					<tr>
						<td>
							<h4 style="color:red;">LISTING DETAILS</h4>
						</td>
					</tr>
					<tr>
						<td><label>Fuel Type</label></td>
						<td>
							<select name="fuel" id="fuel" required>
								<option value="">Select Fuel Type</option>
								<option value="Petrol">Petrol</option>
								<option value="Diesel">Diesel</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Colour</label></td>
						<td>
							<select name="colour" id="colour" required>
								<option value="">Select Colour</option>
								<option value="Red">Red</option>
								<option value="Blue">Blue</option>
								<option value="White">White</option>
								<option value="Black">Black</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Registration No</label>
						</td>
						<td>
							<input type="text" name="regNo" id="regNo" required="Please Enter The Registration No">
						</td>
					</tr>
					<tr>
						<td>
							<label>Insurance Valid Till</label>
						</td>
						<td>
							<input type="date" name="insurance" id="insurance" required>
						</td>
					</tr>
					<tr>
						<td>
							<label>Tell the buyer why you should buy your car</label>
						</td>
						<td>
							<textarea name="ownermsg" id="ownermsg" required="please leave a message"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="submit" value="POST LISTING">
						</td>
					</tr>
				</table>
			</form>
	</div>
</body>
</html>