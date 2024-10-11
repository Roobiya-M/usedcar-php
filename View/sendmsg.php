<?php
session_start();
if(isset($_POST['contact'])){
	//echo "hello";
	$sellerid=$_POST['txtuserid'];
	$carid=$_POST['txtcarid'];
	$buyerid=$_SESSION['userid'];

	//echo $sellerid." ".$carid." ".$buyerid;
}
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
		<script>
			$(document).ready(function(){
				$("form").submit(function(event){
					event.preventDefault();
					var name=$("#name").val();
					var number=$("#number").val();
					var msg=$("#msg").val();
					var buyerid='<?php echo($buyerid);?>';
					var newmsg=$.trim(msg);
					var sellerid='<?php echo($sellerid)?>';
					var carid='<?php echo($carid)?>';
					var submit=$("#send").val();

					if(msg==""||msg==null||newmsg==''){
						$(".form-message").text("Please leave a message!");
						$(".form-message").addClass("form-error");
						$("#msg").addClass("input-error");
						$("#msg").focus();
					}
					else{
						// $(".form-message").text("Success");
						$(".form-message").removeClass("form-error");
						$("#msg").removeClass("input-error");
						// $(".form-message").load('../db/insertenquiry.php',{
						// 		buyerid:buyerid,
						// 		name:name,
						// 		number:number,
						// 		message:msg,
						// 		carid:carid,
						// 		sellerid:sellerid,
						// 		submit:submit
						// })
						$.ajax({
							url:'../db/insertenquiry.php',
							type:'post',
							data:{
								buyerid:buyerid,
								name:name,
								number:number,
								message:msg,
								carid:carid,
								sellerid:sellerid,
								submit:submit
							},
							success:function(data){
								//alert(data);
								if(data==1){
									$("#msg").val("");
									$(".form-message").text("Message sent");
									$(".form-message").addClass("form-success");
								}else{
									$("#msg").val("");
									$(".form-message").text("something went wrong");
									$(".form-message").addClass("form-error");
								}
							}
						})
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
		<form method="post" action="../db/insertenquiry.php">
		<table style="padding-left: 200px;">
			<tr>
				<td>
					<h3 style="color:white;text-align: center;">SEND MESSAGE</h1>
				</td>
			</tr>
			<tr>
				<td><label>Name</label></td>
				<td><input type="text" name="name" id="name" value="<?php echo($_SESSION['username']);?>" readonly></td>
			</tr>
			<tr>
				<td><label>Number</label></td>
				<td><input type="text" name="number"  id="number" value="<?php echo($_SESSION['usermobno']);?>" readonly></td>
			</tr>
			<tr>
				<td><label>Message</label></td>
				<td><textarea name="msg" id="msg"></textarea></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="send" id="send" value="send">
				</td>
			</tr>
			<tr>
				<td>
				<p class="form-message"></p>
			</td>
			</tr>
		</table>
		</form>
	</div>
</body>
</html>