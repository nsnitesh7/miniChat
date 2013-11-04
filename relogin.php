<!DOCTYPE html>

<html>
	<head>
		<title>Hosting Site</title>
		<link href = "css/bootstrap.css" rel = "stylesheet">
		<link href = "css/bootstrap-responsive.css" rel = "stylesheet">
		<link href = "css/style.css" rel = "stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script>
		function validateForm()
		  {
		  	var uname=username.value;
		  	var pass=password.value;
//		  	return false;
		  	if(uname=="nitesh" && pass=="niteshhh")
		  	{
		  		return true;
		  	}
		  	document.getElementById("pid").style.color="#FF0000"
	  		document.getElementById("pid").innerHTML="Please provide right username and password."

		  	return false;
		  };
		$(function(){
		  $("#danbtn").click(function(){
		   alert("The button was clicked.");
		  });
		});
		</script>
		
	</head>
	<body>
	
	<div class="centered">
		<div class="container centered sizeW">
			<form action="process_info.php" method="post" class="form-signin" id="login");>
				<h2 class="form-signin-heading">Please sign in</h2>
				<?php
					if($_GET["query"]=="r")
						echo "Please provide right username and password."
				?>
				<input name="username" type="text" class="input-block-level" placeholder="Email address">
				<input name="password" type="password" class="input-block-level" placeholder="Password">
				<label class="checkbox">
				<p id="pid"></p>
					<input type="checkbox" value="remember-me"> Remember me</input>
				</label>
				
				<button class="btn btn-large btn-primary" type="submit">Sign in</button>
			</form>
		</div>
	</div>
	</body>
</html>
