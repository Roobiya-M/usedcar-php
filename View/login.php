<?php
session_start();
if(isset($_SESSION['userid']) && isset($_SESSION['username'])){
?>






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
			<h3 style="color:white;padding: 20px;font-weight: normal;">Welcome <?php echo $_SESSION['username']?>,</h3>
			<h3 style="text-align: center;color: white;font-weight: normal;">Sell or Buy Used Cars</h3>
		</div>
	</div>
</body>
</html>
<?php }else{
	header("location: ../view/home.php");
					exit();
}
?>


