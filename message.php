<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION['username']==null)
		header('Location: login.php');
?>
<html>
  <head>
    <title>Mini-Chatbox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href = "css/bootstrap.css" rel = "stylesheet">
	<link href = "css/bootstrap-responsive.css" rel = "stylesheet">
	<link href = "css/style.css" rel = "stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
		$(document).ready( function(){
		$('#messageArea').load('load.php');
		$('#messageUsers').load('load_users.php');
		var objDiv = document.getElementById('messageArea');
		objDiv.scrollTop = objDiv.scrollHeight;
		refresh();
		});
		 
		function refresh()
		{
			setTimeout( function() {
			  $('#messageArea').load('load.php');
			  $('#messageUsers').load('load_users.php');
			  var objDiv = document.getElementById('messageArea');
			  objDiv.scrollTop = objDiv.scrollHeight;
			  refresh();
			}, 500);
		}
		/*
		$(document).on("keyup", function(e) {
		        var code = e.which;
		        if (code == 13)
		        {
		            $('#usrform_webPage').submit();
		            
		        }
		    });
		 */
	</script>
	<style type="text/css">
		body, html {
		            height: 100%;
					padding-right:0;
					margin-right:0;
		        }
		.scrollable{
			max-height: 90%;
			overflow: hidden;
		}
		.scrollable:hover{
			overflow-y:scroll;
		}
		#top {
			/*background-color: #4c66a4;
			color: #ffffff;*/
		}
		#panelGuest{
			overflow-y:auto;
			overflow-x:hidden;
			margin-top:6%;
		}

		#left-menu{
			width:75%;
		}
		#ticker{
			padding-left:0;
			margin-left:0;
			height:300px;
		}
		#ticker-item{
			background-color: #dff0d8;
		}
		#line{
			height:2px;
		}
		#right-bar{
			border-left:4px solid #007AA3;	
			padding-left:5px;
		  margin-left: 82%;
		  *margin-left: 81.5%;
		}
		.navbar-inner, .brand
		{
		   background: rgb(0,136,204); /* Old browsers */
			/* remove the gradient */
		   background-image: none;
			/* set font color to white */
			color: white ! important;
		}

		.populate-messages li{
			width:100%
		}

		.sendersMessage{
			border-left:5px solid rgb(238,238,238);
			padding-top:5px;
			padding-bottom:5px;
			padding-left:15px;
			width:70%;
		}
	message.php
		.receiversMessage{
			border-right:5px solid rgb(238,238,238);
			padding-top:5px;
			padding-bottom:5px;
			padding-right:15px;
			text-align:right;
			margin-left:27%;
			width:70%;
		}
		.slimScrollDiv1{
			float:left;
		}
		.slimScrollDiv2{

		}
	</style>
   	<script>
		function onLoadFunction(){
			var x = $('#messageUsers').height();
			var y = $('#messageUsers').width();
      		$('#messageUsers').slimScroll({
	      	 height: x,
	      	 width: y,
	      	 wrapperClass:'slimScrollDiv1'
	      	});

	      	var x = $('#messageArea').height();
			var y = $('#messageArea').width();
      		$('#messageArea').slimScroll({
	      	 height: x,
	      	 width: y,
	      	 start:'bottom',
	      	 wrapperClass:'slimScrollDiv2'

	      	});

	      	var x = $('#online-friends').height();
			var y = $('#online-friends').width();
      		$('#online-friends').slimScroll({
	      	 height: x,
	      	 width: y,
	      	 wrapperClass:'slimScrollDiv3'
	      	});	
		}
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
				<a href = "message.php" class = "brand">Mini Chatbox</a>
				<a id="btn1" class="btn pull-right btn-info" href="logout.php" role="button">Logout</a>
				<button id="btn" class="btn pull-right btn-info" href="#asume" role="button" data-toggle="modal">New Message</button>
				
			</div>
		</div>
	</div>
	
	
	<!--Top Navbar Login Modal code-->
	<div id="asume" class="modal hide fade">
			<div class="modal-header">
			<div class="centered">
				<div class="container centered sizeW">
					<form class="centered" style="border-left:2px solid rgb(238,238,238); border-right:2px solid rgb(238,238,238);" action="post_newMessage_modal.php" id="usrform_modal" method='POST'>
						<div class="text-center">
							<div class="modal-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<input style='width:300px' name="msgUsername" type="email" class="form-control" id="msgInputEmail_modal" placeholder="Email">
										</tr>
									</thead>
								</table>
							</div>
							<textarea name="postmsg1" form="usrform_modal" rows="4" style="width:80%; margin-top:-20px"></textarea>
						</div>
						<input style="margin-left:400px" value="Submit" type="submit"/>
					</form>
				</div>
			</div>
		</div>
	</div>
		
  <div class="container-fluid max-height no-overflow">
	<div class="row-fluid" id="top">
			<!--For displaying usernames in messages on left side.-->
			<div class="row-fluid" id="panelGuest" >
				<div class="span4 scrollable" style="height:600px;" id="messageUsers">
						
				</div>
				
				<!--For new message.-->
				<div id="newMessageDiv_webPage" class="span7">
					<h4 class="text-info text-center">New Message</h4>
						<form class="centered" style="border-left:2px solid rgb(238,238,238); border-right:2px solid rgb(238,238,238);" action="post_newMessage_webPage.php" id="usrform_webPage" method='POST'>
							<div class="text-center">
								<div class="modal-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<input style='width:800px' name="msgUsername1" type="email" class="form-control" id="msgInputEmail_webPage" placeholder="Email">
												
											</tr>
										</thead>
									</table>
									<div style="height:300px; border-left:2px solid rgb(238,238,238); border-right:2px solid rgb(238,238,238);" id = "newMessageArea">
									</div>
								</div>
								<textarea name="postmsg2" form="usrform_webPage" rows="4" style="width:90%; margin-top:20px;"></textarea>
							</div>
							<input style="margin-left:0px" type="submit" value="Submit"/>
						</form>
				</div>
				
				<!--For viewing others message.-->
				<div id="messageDiv" class="span7" style="display:none">
					<h4 class="text-info text-center"><?php echo $_GET['user']; ?></h4>
					<?php $_SESSION['u']=$_GET['user']; ?>
					<div style="height:400px; border-left:2px solid rgb(238,238,238); border-right:2px solid rgb(238,238,238);" class="scrollable"  id = "messageArea">
						
<!--							<li><div class="sendersMessage">sender's message goes here...</div></li>
							<li><div class="receiversMessage">Receiver's message goes here...<br/> yo man ssup?</div></li>
							<li><div class="sendersMessage">sender's message goes here...</div></li>
							<li><div class="receiversMessage">Hey man!! <br/> I am good and sound!! you say how is your database project going? I heard you guys are building a prototype of facebook.. nice project huh!!...</div></li>
							<li><div class="sendersMessage">sender's message goes here...</div></li>
							<li><div class="receiversMessage">Receiver's message goes here...<br/> yo man ssup?</div></li>
							<li><div class="sendersMessage">sender's message goes here...</div></li>
							<li><div class="receiversMessage">Hey man!! <br/> I am good and sound!! you say how is your database project going? I heard you guys are building a prototype of facebook.. nice project huh!!...</div></li>
							<li><div class="sendersMessage">sender's message goes here...</div></li>
							<li><div class="receiversMessage">Receiver's message goes here...<br/> yo man ssup?</div></li>
							<li><div class="sendersMessage">sender's message goes here...</div></li>
							<li><div class="receiversMessage">Hey man!! <br/> I am good and sound!! you say how is your database project going? I heard you guys are building a prototype of facebook.. nice project huh!!...</div></li>
							<li><div class="sendersMessage">sender's message goes here...</div></li>
							<li><div class="receiversMessage">Receiver's message goes here...<br/> yo man ssup?</div></li>
							<li><div class="sendersMessage">sender's message goes here...</div></li>
							<li><div class="receiversMessage">Hey man!! <br/> I am good and sound!! you say how is your database project going? I heard you guys are building a prototype of facebook.. nice project huh!!...</div></li>
							<li><div class="sendersMessage">test<br/>test<br/>test<br/>test<br/>test<br/>test<br/>test<br/>test<br/>test<br/>test<br/>test<br/>test<br/></div></li>
-->							

					</div>
					<?php
					 $_SESSION['receiver'] = $_GET['user']; ?>
					<form class="centered" action="post_message.php" id="usrform" method='post'>
						<div class="text-center">
							<textarea name="postmsg" form="usrform" rows="4" style="width:90%; margin-top:20px;"></textarea>
						</div>
						<input style="margin-left:0px" value="Submit" type="submit"/>
					</form>
				</div>		
				<?php
					if(isset($_GET["user"]))
					{
						echo "<script>document.getElementById('newMessageDiv_webPage').style.display = 'none';</script>";
						echo "<script>document.getElementById('messageDiv').style.display = 'block';</script>";
						echo "<script>
							var objDiv = document.getElementById('messageArea');
     						objDiv.scrollTop = objDiv.scrollHeight;
						</script>";
					}
					
				?>	
			</div>
	  	</div>
<!--	  	
		<div class="span2" id="right-bar" style="position:fixed; height:100%;">
			<div id="ticker" style="height:40%;">
			<ul class="nav nav-list" id="left-menu" >
				<li class="nav-header">Activities</li>
				<li id="ticker-item"><a href="#">Rahul Singhal is now friends with Aditya Raj</a></li><div id="line"></div>
				<li id="ticker-item"><a href="#">Aditya Raj likes your status "yo"</a></li><div id="line"></div>
				<li id="ticker-item"><a href="#">Nishit Bhandari poked you.</a></li><div id="line"></div>
			</ul>
			</div>
			<hr>
			<div id="online" style="height:60%;">
			<div id = "online-friends" class="scrollable" style="height:80%; width:90%;">
				<ul class="nav nav-list" id="left-menu"  >
					<li class="nav-header">Online Friends</li>
					<li><a href="#">Rahul Singhal</a></li>
					<li><a href="#">Aditya Raj</a></li>
					<li><a href="#">Nishit Bhandari</a></li>
					<li><a href="#">Nishit Bhandari</a></li>
					<li><a href="#">User1</a></li>
					<li><a href="#">User2</a></li>
					<li><a href="#">User3</a></li>
					<li><a href="#">User4</a></li>
					<li><a href="#">User5</a></li>
					<li><a href="#">User6</a></li>
					<li><a href="#">User7</a></li>
					<li><a href="#">User8</a></li>
					<li><a href="#">User9</a></li>
				</ul>
			</div>
			<input style="width:90%; margin-top:3%; margin-left:5%;" placeholder="Search Friend.." />
	  </div>
-->
  </div>
  </body>
</html>

