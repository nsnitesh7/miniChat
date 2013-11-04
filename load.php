<?php
	session_start();
	require_once 'config.php';
	$dictMessage = array();
	$result = mysqli_query($con,"SELECT * FROM message WHERE (sender='$_SESSION[username]' and receiver='$_SESSION[u]') or (receiver='$_SESSION[username]' and sender='$_SESSION[u]')");
	while($row = mysqli_fetch_array($result))
	{
		if($row['sender']==$_SESSION['username'])
		{
			if (array_key_exists($row['receiver'],$dictMessage))
			{
				$dictMessage[$row['receiver']]=$dictMessage[$row['receiver']]."<li><div class=''>"."<b style='color:green'><br>".$row['sender']."</b><br>".$row['message']."</div></li>";
			}
			else
			{
				$dictMessage[$row['receiver']]="<ul style='list-style-type:none; width:90%;' class='populate-messages'>";
				$dictMessage[$row['receiver']]=$dictMessage[$row['receiver']]."<li><div class=''>"."<b style='color:green'><br>".$row['sender']."</b><br>".$row['message']."</div></li>";
			}
		}
		else
		{
			if (array_key_exists($row['sender'],$dictMessage))
			{
				$dictMessage[$row['sender']]=$dictMessage[$row['sender']]."<li><div class=''>"."<b style='color:green'><br>".$row['sender']."</b><br>".$row['message']."</div></li>";
			}
			else
			{
				$dictMessage[$row['sender']]="<ul style='list-style-type:none; width:90%;' class='populate-messages'>";
				$dictMessage[$row['sender']]=$dictMessage[$row['sender']]."<li><div class=''>"."<b style='color:green'><br>".$row['sender']."</b><br>".$row['message']."</div></li>";
			}
		}
	}
	foreach ($dictMessage as $key => $value)
	{
		$dictMessage[$key]=$dictMessage[$key]."</ul>";
		echo $dictMessage[$key];
	}
	
	mysqli_close($con);
?>
