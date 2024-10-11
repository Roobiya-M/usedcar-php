<?php
if(isset($_POST['edit'])){
	session_start();
	$carid=$_POST['txtcarid'];
	$_SESSION['carid']=$carid;
	$userid=$_POST['txtuserid'];
	//echo $carid.$userid;	
	include '../db/dbconn.php';
	if(!$conn){
		die("Something went wrong..!.Please try again..!".mysqli_connect_error());
	}
	else{
		$sql="SELECT * FROM sellcar WHERE carid='$carid'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				$city=$row['city'];
				$pincode=$row['pincode'];
				$mfgyear=$row['mfgyear'];
				$make=$row['make'];
				$model=$row['model'];
				$kms=$row['kms'];
				$owners=$row['noofowners'];
				$expprize=$row['expprize'];

				// print_r($row);
				// echo $city.$pincode;
			}
		}
		else{
			echo "Something went wrong..!".mysqli_error($conn);
			header('location:myown.php');
		}
		$sqlfetch="SELECT * FROM upload WHERE carid='$carid'";
		$res=mysqli_query($conn,$sqlfetch);
		if(mysqli_num_rows($res)>0){
			while($record=mysqli_fetch_assoc($res)){
				// print_r($record);
				$img=$record['carimg'];
				$fuel=$record['fuel'];
				$colour=$record['colour'];
				$regNo=$record['regNo'];
				$insurance=$record['insurance'];
				$message=$record['message'];
				$_SESSION['uploadid']=$record['uploadid'];
			}
		}else{
			echo "Something went wrong..!".mysqli_error($conn);
			header('location:myown.php');
		}
	}



	// if (isset($_POST['postlist'])) {
	// 					// if(isset($_POST['img'])){
	// 					// 	$imgloc=$_FILES['img']['tmp_name'];
	// 					// }
	// 					// else{
	// 					// 	$imgloc="no location";
	// 					// 	//echo $imgloc;
	// 					// }
	// 	var_dump($_FILES['img']);
						
	// 				}
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
					
					// var imgloc='<?php ($imgloc)?>';
					// console.log(imgloc);
					var city=$("#city").val();
					console.log(city);
					var pincode=$("#pincode").val();
					var mfgyear=$("#mfgyear").val();
					var make=$("#make").val();
					var model=$("#model").val();
					var kms=$("#kms").val();
					var ownernos=$("#ownernos").val();
					var expprize=$("#expprize").val();


					// var imgsrc='<?php ($img)?>';
					// console.log(imgsrc);
					// // var newimgloc=$("#img").val();
					// // console.log(newimgloc);
					// var length=$("#img")[0].files.length;
					// if(length==0){
					// 	var items="";
					// 	var filename="";
					// 	var newimgloc="";
					// }
					// else{
					// 	var items=$("#img")[0].files;
					// var filename=items[0].name;
					// var newimgloc=$("#img").val();
					// console.log(newimgloc);
					// console.log(items);
					// console.log(length);
					// }


					var property=document.getElementById("img").files[0];
					console.log(property);
					var length=$("#img")[0].files.length;
					console.log(length);
					var form_data=new FormData();
					form_data.append("image",property);
					//console.log(formdata);
					if(length!=0)
					{
					$.ajax({
						url:"../db/updatecarimage.php",
						method:"POST",
						data:form_data,
						cache:false,	
						contentType:false,
						processData:false,
						success:function(data){
							console.log(data);
							
						}

					})
				}


					var fuel=$("#fuel").val();
					var colour=$("#colour").val();
					var insdate=$("#insurance").val();
					var regNo=$("#regNo").val();
					var message=$("#ownermsg").val();	
					// // console.log(filename); 	
					 var submit=$("#submit").val();
					$(".form-message").load("../include/editcarval.php",{
						//  lhs:postname rhs:the value we got on top from input fields
						city:city,
						pincode:pincode,
						mfgyear:mfgyear,
						make:make,
						model:model,
						kms:kms,
						ownernos:ownernos,
						expprize:expprize,
						// length:length,
						// imgsrc:imgsrc,
						// newimgloc:newimgloc,
						// filename:filename,
						fuel:fuel,
						colour:colour,
						insdate:insdate,
						regNo:regNo,
						message:message,
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
		<h1 style="text-align: center">USED CAR</h1>
		<div class="navbar">
			<a href="home.php"style="color: lightgreen;">Home</a>
			<a href="myown.php"style="color: lightgreen;">My used car listing </a>
			<a href="sellcar.php"style="color: lightgreen;">Sell your car</a>
			<a href="enquiry.php"style="color: lightgreen;">Enquiries</a>
			<a href="editprofile.php"style="color: lightgreen;">Edit Profile</a>
			<a href="view.php"style="color: lightgreen;">View Full Listing</a>
			<a href="logout.php"style="color: lightgreen;">Logout</a>
			</div>
			
			<h4 style="text-align: center;color:magenta;">Just fill your information and Get started</h4>
			<form method="POST" action="../include/editcarval.php" enctype="multipart/form-data">
				<table align="center">
					<tr>
						<td><label>City</label></td>
						<td><input type="text" name="city" id="city" value="<?php echo($city);?>"></td>
					</tr>
					<tr>
						<td><label>Pincode</label></td>
						<td><input type="text" name="pincode" id="pincode" value="<?php echo($pincode);?>"></td>
					</tr>
				</table>
				<h4 style="text-align: center;color:red;">CAR INFORMATION</h4>
				<table align="center">
					<tr>
						<td><label>MFG Year</label></td>
						<td><input type="text" name="mfgyear" id="mfgyear" value="<?php echo($mfgyear);?>"></td>
					</tr>
					<tr>
						<td><label>Make</label></td>
						<td><select name="make" id="make">
						<option value="-1">Select</option>
						<option value="Tata" <?php if($make=='Tata') echo'selected=="selected"';?>>Tata</option>
						<option value="Maruti" <?php if($make=='Maruti') echo'selected=="selected"';?>>Maruti</option>					
					</select></td>
					</tr>
					<tr>
					<td><label>Model</label></td>
						<td><input type="text" name="model" id="model" value="<?php echo($model);?>"></td>
					</tr>
					<tr>
						<td><label>KMs Driven</label></td>
						<td><input type="text" name="kms" id="kms" value="<?php echo($kms);?>"></td>
					</tr>
					<tr>
						<td><label>No of Owners</label></td>
						<td><input type="text" name="ownernos" id="ownernos" value="<?php echo($owners);?>"></td>
					</tr>
					<tr>
						<td><label>Expected Prize</label></td>
						<td><input type="text" name="expprize" id="expprize" value="<?php echo($expprize);?>"></td>
					</tr>
					<tr>
						<td>
							<label>Upload Image</label>
						</td>
						<td>
							<!-- <div style="height:170px;width:170px;border:1px solid white;float: left; "> -->
								
							<!-- </div> -->
							<img src="<?php echo($img) ?>" width="170px" height="170px" id="uploadimg">
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="file" name="img" id="img"></td>
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
					</table>
							<h4 style="color:red;text-align: center;">LISTING DETAILS</h4>
						<table align="center">
					<tr>
						<td><label>Fuel Type</label></td>
						<td>
							<select name="fuel" id="fuel" required>
								<option value="">Select Fuel Type</option>
								<option value="Petrol" <?php if ($fuel=='Petrol') echo 'selected=="selected"';?>>Petrol</option>
								<option value="Diesel" <?php if($fuel=='Diesel')echo 'selected=="selected"';?>>Diesel</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Colour</label></td>
						<td>
							<select name="colour" id="colour" required>
								<option value="">Select Colour</option>
								<option value="Red" <?php if ($colour=='Red') echo 'selected=="selected"';?>>Red</option>
								<option value="Blue" <?php if ($colour=='Blue') echo 'selected=="selected"';?>>Blue</option>
								<option value="White" <?php if ($colour=='White') echo 'selected=="selected"';?>>White</option>
								<option value="Black" <?php if ($colour=='Black') echo 'selected=="selected"';?>>Black</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>Registration No</label>
						</td>
						<td>
							<input type="text" name="regNo" id="regNo" value="<?php echo($regNo)?>">
						</td>
					</tr>
					<tr>
						<td>
							<label>Insurance Valid Till</label>
						</td>
						<td>
							<input type="date" name="insurance" id="insurance" required value="<?php echo($insurance)?>">
						</td>
					</tr>
					<tr>
						<td>
							<label>Tell the buyer why you should buy your car</label>
						</td>
						<td>
							<textarea name="ownermsg" id="ownermsg"  ><?php echo($message)?></textarea>
						</td>
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
	
<?php }
else if(isset($_POST['delete'])){
	//echo "delete";
	$carid=$_POST['txtcarid'];
	$_SESSION['carid']=$carid;
	$userid=$_POST['txtuserid'];
	//echo $carid.$userid;
	include '../db/dbconn.php';
	if(!$conn){
		die("Something went wrong ..!Please try again later!".mysqli_connect_error());
	}else{
		$sql="SELECT * FROM upload WHERE carid='$carid'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				$uploadid=$row['uploadid'];
				//echo "$uploadid";
				$sqldelete="DELETE FROM upload WHERE uploadid='$uploadid' AND carid='$carid'";
				if(mysqli_query($conn,$sqldelete)){
					//echo "deleted upload";
					$sqldel="DELETE FROM sellcar WHERE carid='$carid'";
					if(mysqli_query($conn,$sqldel)){
						//echo "deleted sellcar also";
						header('location:../view/myown.php');
					}
				}
			}
		}
	}
}
?>




