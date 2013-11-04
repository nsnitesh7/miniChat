<?php
	session_start();
	require_once 'config.php';
	$_SESSION['receiver']=$_POST['msgUsername'];
	echo $_SESSION['username'].$_SESSION['receiver'].$_POST['postmsg1'];
	exit();
	//mysqli_query($con,"INSERT INTO message (`sender`,`receiver`,`message`) VALUES ('a@a','c@c','loveWorking')");
	mysqli_query($con,"INSERT INTO message (`sender`,`receiver`,`message`) VALUES ('$_SESSION[username]','$_SESSION[receiver]','$_POST[postmsg]')");
	header('Location: message.php?user='.$_SESSION['receiver']);
	mysqli_close($con);
?>
