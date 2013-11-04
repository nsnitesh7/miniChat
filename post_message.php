<?php
	session_start();
	require_once 'config.php';
	echo $_SESSION['username'].$_SESSION['receiver'].$_POST['postmsg'];
	if($_SESSION['username']=="" or $_SESSION['receiver']=="" or $_POST['postmsg']=="")
	{
		header('Location: message.php');
		exit();
	}
	//exit();
	//mysqli_query($con,"INSERT INTO message (`sender`,`receiver`,`message`) VALUES ('a@a','c@c','loveWorking')");
	mysqli_query($con,"INSERT INTO message (`sender`,`receiver`,`message`) VALUES ('$_SESSION[username]','$_SESSION[receiver]','$_POST[postmsg]')");
	header('Location: message.php?user='.$_SESSION['receiver']);
	mysqli_close($con);
?>
