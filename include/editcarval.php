<?php
if(isset($_POST['submit'])){

	$city=$_POST['city'];
	$pincode=$_POST['pincode'];
	$mfgyear=$_POST['mfgyear'];
	$make=$_POST['make'];
	$model=$_POST['model'];
	$kms=$_POST['kms'];
	$ownersno=$_POST['ownernos'];
	$expprize=$_POST['expprize'];
	// $imgsrc=$_POST['imgsrc'];
	// $newimgloc=$_POST['newimgloc'];
	// $filename=$_POST['filename'];
	// $length=$_POST['length'];
	$fuel=$_POST['fuel'];
	$colour=$_POST['colour'];
	$insdate=$_POST['insdate'];
	$regNo=$_POST['regNo'];
	$message=$_POST['message'];
	//$terms=$_POST['terms'];
	
	$errorcity=false;
	$errorpincode=false;
	$errormfgyear=false;
	$errormake=false;
	$errormodel=false;
	$errorkms=false;
	$errorowner=false;
	$errorprize=false;
	$errorregNo=false;
	$errormsg=false;

	$patternpost="/^[0-9]{6}$/";
	$patternyear="/^[0-9]{4}$/";
	
	if(empty($city)||trim($city)==""){
		echo "<span class='form-error'>Enter valid City!</span>";
		$errorcity=true;
	}elseif (empty($pincode)||$pincode==''||!preg_match($patternpost, $pincode)) {
		echo "<span class='form-error'>Enter valid pincode!</span>";
		$errorpincode=true;
	}elseif(empty($mfgyear)||!is_numeric($mfgyear)||!preg_match($patternyear, $mfgyear)||$mfgyear>date('Y')){
		echo "<span class='form-error'>Enter valid year!</span>";
		$errormfgyear=true;
	}elseif($make==-1){
		echo "<span class='form-error'>Select make!</span>";
		$errormake=true;
	}elseif(empty($model)||trim($model)==""){
		echo "<span class='form-error'>Enter valid model!</span>";
		$errormodel=true;
	}elseif(empty($kms)||!is_numeric($kms)){
		echo "<span class='form-error'>Enter KMs Driven!</span>";
		$errorkms=true;
	}elseif(empty($ownersno)||!is_numeric($ownersno)){
		echo "<span class='form-error'>Enter No of Owners!</span>";
		$errorowner=true;
	}elseif(empty($expprize)||!is_numeric($expprize)){
		echo "<span class='form-error'>Enter Expected Prize!</span>";
		$errorprize=true;
	}
	elseif(empty($regNo)||trim($regNo)==""){
		echo "<span class='form-error'>Enter valid Registration No!</span>";
		$errorregNo=true;
	}
	elseif(empty($message)||trim($message)==""){
		echo "<span class='form-error'>Please leave a message!</span>";
		$errormsg=true;
	}
	else{
		echo "<span class='form-success'>Success</span>";
	

	
	}		
}else{
	echo "There was an error";
}
?>
<script>
	
	var errorsell=false;

	$("#city,#pincode,#mfgyear,#make,#model,#kms,#ownernos,#expprize,#regNo,#ownermsg").removeClass("input-error");
	var errorcity="<?php echo($errorcity) ?>";
	var errorpincode="<?php echo($errorpincode) ?>";
	var errormfgyear="<?php echo($errormfgyear) ?>";
	var errormake="<?php echo($errormake) ?>";
	var errormodel="<?php echo($errormodel) ?>";
	var errorkms="<?php echo($errorkms) ?>";
	var errorowner="<?php echo($errorowner) ?>";
	var errorprize="<?php echo($errorprize) ?>";
	var errorregNo="<?php echo($errorregNo) ?>";
	var errormsg="<?php echo($errormsg) ?>";
	

	var city="<?php echo($city) ?>";
	var pincode="<?php echo($pincode) ?>";
	var mfgyear="<?php echo($mfgyear) ?>";
	var make="<?php echo($make) ?>";
	var model="<?php echo($model) ?>";
	var kms="<?php echo($kms) ?>";
	var ownersno="<?php echo($ownersno) ?>";
	var expprize="<?php echo($expprize) ?>";
	var regNo="<?php echo($regNo) ?>";
	var message="<?php echo($message) ?>";
	// var imgsrc="<?php ($imgsrc) ?>";
	// var newimgloc="<?php ($newimgloc) ?>";
	// var length="<?php ($length) ?>";
	// var filename="<?php ($filename) ?>";
	var fuel="<?php echo($fuel) ?>";
	var colour="<?php echo($colour) ?>";
	var insdate="<?php echo($insdate) ?>";





	

	if(errorcity==true){
		$("#city").focus();
		$("#city").addClass("input-error");
		errorsell=true;
		
	}
	else if(errorpincode==true){
		$("#pincode").addClass("input-error");
		$("#pincode").focus();
		errorsell=true;
		
	}
	// else if(erroremailexists==true){
	// 	$("#regemail").addClass("input-error");
	// 	$("#regemail").focus();
	// 	errorsell=true;
	// }
	
	else if(errormfgyear==true){
		$("#mfgyear").addClass("input-error");
		$("#mfgyear").focus();
		errorsell=true;
	}
	else if(errormake==true){
		$("#make").addClass("input-error");
		$("#make").focus();
		errorsell=true;
	}
	else if(errormodel==true){
		$("#model").addClass("input-error");
		$("#model").focus();
		errorsell=true;
	}
	else if(errorkms==true){
		$("#kms").addClass("input-error");
		$("#kms").focus();
		errorsell=true;
	}
	else if(errorowner==true){
		$("#ownernos").addClass("input-error");
		$("#ownernos").focus();
		errorsell=true;
	}
	else if(errorprize==true){
		$("#expprize").addClass("input-error");
		$("#expprize").focus();
		errorsell=true;
	}
	else if(errorregNo==true){
		$("#regNo").addClass("input-error");
		$("#regNo").focus();
		errorsell=true;
	}
	else if(errormsg==true){
		$("#ownermsg").addClass("input-error");
		$("#ownermsg").focus();
		errorsell=true;
	}
	else{
		errorsell=false;
		
				 $.ajax({
				 	url:'../db/updatecar.php',
				 	type:'post',
				 	data:{
				 		erroreditcar:errorsell,
				 		city:city,
				 		pincode:pincode,
				 		mfgyear:mfgyear,
				 		make:make,
				 		model:model,
				 		kms:kms,
				 		ownersno:ownersno,
				 		expprize:expprize,
				 		regNo:regNo,
				 		fuel:fuel,
				 		colour:colour,
				 		insdate:insdate,
				 		message:message,
				 		// imgsrc:imgsrc,
				 		// newimgloc:newimgloc,
				 		// length:length,
				 		// filename:filename
				 		

				 	},
				 	
				 	success:function(data){
				 		console.log(data);
				 		if(data!=1){		 			
		 			
							errorsell=true;
				 		}
				 		else{

				 			 window.location="../view/myown.php";
				 			 
				 		}
				 		
				 		}
				 	

		 })
		
		
}
	
</script>
	