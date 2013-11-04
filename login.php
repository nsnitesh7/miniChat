<!DOCTYPE html>
<?php
session_start();
?>
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
		<!--Top Navbar code-->
		<div class = "navbar navbar-fixed-top">
			<div class = "navbar-inner">
				<div class = "container">
					<a class = "btn btn-navbar" data-toggle = "collapse" data-target = ".nav-collapse">
						<i class = "icon-tasks"></i>
					</a>
					<a href = "#" class = "brand">Mini Chatbox</a>
					<button id="btn" class="btn pull-right btn-info" href="#awesomeNess" role="button" data-toggle="modal">Login</button>
				</div>
			</div>
		</div>
		
		
		<!--Top Navbar Login Modal code-->
		<div id="awesomeNess" class="modal hide fade">
			<div class="modal-header">
				<div class="centered">
					<div class="container centered sizeW">
						<form action="login_info.php" method="post" class="form-signin  form-horizontal" id="login");>
							<h2 class="form-signin-heading">Please Sign In</h2>
							<?php
								if(isset($_GET["query"]) && $_GET["query"]=="r")
								{
									echo "<p style='color:red'>Please provide right username and password.</p><br>";
								}
							?>
							<div class="form-group" style="margin-left:-70px">
								<label for="inputEmail1" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input name="username_login" type="email" class="form-control" id="inputEmail1" placeholder="Email">
								</div>
							</div>
							<div class="form-group" style="margin-left:-70px">
								<label for="inputPassword1" class="col-lg-2 control-label">Password</label>
								<div class="col-lg-10">
									<input name="password_login" type="password" class="form-control" id="inputPassword1" placeholder="Password">
								</div>
							</div>
							<br>
							<div class="form-group" style="margin-left:-70px">
								<div class="col-lg-offset-2 col-lg-10">
									<button style="margin-left:100px" type="submit" class="btn btn-primary">Sign in</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			if(isset($_GET["query"]) && $_GET["query"]=="r")
			{
				echo "<script>$('#btn').trigger('click');</script>";
			}
		?>
		
		<div class="centered">
			<div class="container" style="margin-top:100px;width:400px">
				<form action="signup_info.php" method="post" class="form-signin form-horizontal" id="signup");>
					<h2 class="form-signin-heading">Please Sign Up</h2>
					<p style="color:red" id="pid"></p>
					<?php 
						if(isset($_GET["query"]) && $_GET["query"]=="s")
						{
							echo 
							"<script>
								document.getElementById('pid').style.color='#FF0000'
								document.getElementById('pid').innerHTML='Please provide correct details.'
							</script>";
						}
						else if(isset($_GET["query"]) && $_GET["query"]=="userExists")
						{
							echo 
							"<script>
								document.getElementById('pid').style.color='#FF0000'
								document.getElementById('pid').innerHTML='User already exists. Please provide other Email.'
							</script>";
						}
						else if(isset($_GET["query"]) && $_GET["query"]=="thanksSignup")
						{
							echo 
							"<script>
								document.getElementById('pid').style.color='green'
								document.getElementById('pid').innerHTML='Thanks for the Signup.'
							</script>";
						}
					?>
					<div class="form-group" style="margin-left:-70px">
						<label for="inputEmail1" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
							<input name="username_signup" type="email" class="form-control" id="inputEmail1" placeholder="Email">
						</div>
					</div>
					<div class="form-group" style="margin-left:-70px">
						<label for="inputPassword1" class="col-lg-2 control-label">Password</label>
						<div class="col-lg-10">
							<input name="password_signup1" type="password" class="form-control" id="inputPassword1" placeholder="Password">
						</div>
					</div>
					<div class="form-group" style="margin-left:-70px">
						<label for="inputPassword1" class="col-lg-2 control-label">Re-Enter Password</label>
						<div class="col-lg-10">
							<input name="password_signup2" type="password" class="form-control" id="inputPassword2" placeholder="Password">
						</div>
					</div>
					<br>
					<div class="form-group" style="margin-left:-70px">
						<div class="col-lg-offset-2 col-lg-10">
							<button style="margin-left:100px" type="submit" class="btn btn-primary">Sign Up</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
