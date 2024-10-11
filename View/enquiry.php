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
			table{
				border:6px groove gray;
			}
			th,td{
				border:3px groove gray;
				color: white;
			}
			/*table{
				padding-left: 150px;
			}*/
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
		<form style="padding-left: 150px;">
			<h3 style="color:white;">MESSAGE</h3>
			<?php
			session_start();
			$userid=$_SESSION['userid'];
			//echo "$userid";
			include '../db/dbconn.php';
			if(!$conn){
				die("Something went wrong..!".mysqli_connect_error());
			}else{
				$sql="SELECT * FROM enquiry WHERE sellerid='$userid'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){?>
					<table>
						<?php
					while($row=mysqli_fetch_assoc($result)){
						$i=0;
						?>

						<tr>
							<td><?php echo($i++);?></td>
							<td><?php echo($row['name']);?></td>
							<td><?php echo($row['number']);?></td>
							<td><?php echo($row['message']);?></td>
						</tr>
						<?php
					}?>
					</table>
					<?php
				}

			}
			?>
			
				
				
			</table>
				
		</form>
	</div>
</body>
</html>