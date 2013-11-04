<?php
	session_start();
	require_once 'config.php';
	$_SESSION['receiver']=$_POST['msgUsername1'];
	echo $_SESSION['username'].$_SESSION['receiver'].$_POST['postmsg2'];
	if($_SESSION['username']=="" or $_SESSION['receiver']=="" or $_POST['postmsg2']=="")
	{
		header('Location: message.php');
		exit();
	}//mysqli_query($con,"INSERT INTO message (`sender`,`receiver`,`message`) VALUES ('a@a','c@c','loveWorking')");
	mysqli_query($con,"INSERT INTO message (`sender`,`receiver`,`message`) VALUES ('$_SESSION[username]','$_SESSION[receiver]','$_POST[postmsg2]')");
	header('Location: message.php?user='.$_SESSION['receiver']);
	mysqli_close($con);
?>
