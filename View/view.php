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
		include '../db/dbconn.php';
		session_start();
		$userid=$_SESSION['userid'];
		// $userid=73;
		if(!$conn){
			die("Something went wrong!Please try again..!".mysqli_connect_error());
		}else{
			$sql="SELECT * FROM sellcar INNER JOIN upload ON sellcar.carid=upload.carid WHERE sellcar.carid IN (SELECT carid FROM sellcar WHERE userid!='$userid')";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				//echo("Successfull");
				while($row=mysqli_fetch_assoc($result)){ ?>
				<div style="height:310px;width:200px;margin-left:30px;margin-bottom: 20px;  border-bottom:1px solid white;float: left; ">
					<form method="post" action="sendmsg.php">
					<table style="margin-left: 10px;">
						<tr>
							<td>
					<img src="<?php echo($row['carimg']); ?>" width="170px" height="200px">
					</td>
				</tr>
					<tr>
						<td>
					<input type="text" name="txtcarid"  value="<?php echo($row['carid']);?>" style="display: none;">
					</td>
				</tr>
				<tr>
						<td>
					<input type="text" name="txtuserid"  value="<?php echo($row['userid']);?>" style="display: none;">
					</td>
				</tr>
					<tr>
						<td style="background:blue;">
							<label>City:</label><label><?php echo($row['city']);?></label>
					</td>
				</tr>
				<tr>
						<td style="background:blue;">
							<label>Year:</label><label><?php echo($row['mfgyear']);?></label>
					</td>
				</tr>
				<tr>
						<td style="background:blue;">
							<label>Model:</label><label><?php echo($row['model']);?></label>
					</td>
				</tr>
					<tr><td>
					<input type="submit" name="contact" value="CONTACT SELLER">
					
					</td></tr>
					</table>
				</form>
				</div>
		<?php }
			}

		}
		?>
	</div>
</body>
</html>