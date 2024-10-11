<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/stylehome.css">
	<script src="../jquery/jquery.js"></script>
	<script src="../jquery/jshome.js"></script>
</head>
<body>
	<div class="container">		
		<h1 style="text-align: center">USED CAR</h1>
		<div class="divlogin">
			<form method="post" action="../include/log.php">
			<label style="color: white;">Members Login</label><br><br>
			<label for="email" style="color: deepskyblue;">Email ID</label>
			<input type="text" name="email" id="email"/>
			<label for="password" style="color: deepskyblue;">Password</label>
			<input type="password" name="password" id="password"/>
			<input type="submit" name="login" id="login" value="Login"/>
			<input type="button" name="register" id="register" value="Register Now"/>
			<?php if(isset($_GET['error'])){?>
				<p class="error" style="background:#F2DEDE;color:#A94442;width:95%;padding:10px;margin:20px auto;"><?php echo $_GET['error'];?></p>
			<?php }?>
			
			</form>
			
		</div>
		<br><br>
			<div class="divsearch">
				
			<label>Search?</label><br><br>
			<table>
				<tr>
					<td>
					<label>Model</label>
					</td>
					<td>
					<select name="model">
					<option value="susuki">susuki</option>
					<option value="swift">swift</option>
					<option value="altroz">altroz</option>
					<option value="i20">i20</option>
					</select>
				</td>
				</tr>
				<tr>
					<td>
					<label>Year</label>
					</td>
					<td>
					<input type="text" name="year"/>
					</td>
				</tr>
				<tr>
				<td></td>
				<td>
				<input type="button" name="go" value="Go"/>
				</td>
				</tr>
				<tr>
					<td>	<label>city</label></td>
			<td><input type="text" name="city"/></td></tr>
			<tr>
				<td></td><td>
			<input type="button" name="search" value="search"/></td></tr>
			</table>
		</div>
	</div>

</body>
</html>