$(document).ready(function(){
	
				$("form").submit(function(event){
		event.preventDefault();
		var name=$("#regname").val();
		var email=$("#regemail").val();
		var cemail=$("#regcnfmemail").val();
		var password=$("#regpass").val();
		var mobno=$("#regmobno").val();
		var phno=$("#regphno").val();
		var state=$("#regstate").val();
		var city=$("#regcity").val();
		var addr=$("#regaddr").val();
		var post=$("#regpost").val();
		var submit=$("#submit").val();
		$(".form-message").load("../include/regvalidate.php",{
			//  lhs:postname rhs:the value we got on top from input fields
			name:name,
			email:email,
			cemail:cemail,
			password:password,
			mobno:mobno,
			phno:phno,
			state:state,
			city:city,
			addr:addr,
			post:post,
			submit:submit

		});
		
		
	})
	
	

});