<?php
	session_start();
	echo "<ul style='list-style-type:none;'>";
	require_once 'config.php';
	$dict = array();
	$result = mysqli_query($con,"SELECT * FROM message WHERE sender='$_SESSION[username]' or receiver='$_SESSION[username]' ORDER BY time DESC");
	$bool=0;
	while($row = mysqli_fetch_array($result))
	{
		if($row['receiver']==$_SESSION['username'])
		{
			if (array_key_exists($row['sender'],$dict))
			{
				continue;
			}
			else
			{
				$dict[$row['sender']]=1;
				if($bool==0)
				{
					echo "<a href='message.php?user=".$row['sender']."'><li><blockquote style='border: 2px solid rgb(102, 102, 102); padding: 10px; background-color: rgb(204, 204, 204);'><p>".$row['sender']."</p><small>Last received message goes here...</small></blockquote></li><hr/></a>";
					$bool=1;
				}
				else
					echo "<a href='message.php?user=".$row['sender']."'><li><blockquote><p>".$row['sender']."</p><small>Last received message goes here...</small></blockquote></li><hr/></a>";
			}
		}
		else
		{
			if (array_key_exists($row['receiver'],$dict))
			{
				continue;
			}
			else
			{
				$dict[$row['receiver']]=1;
				if($bool==0)
				{
					echo "<a href='message.php?user=".$row['receiver']."'><li><blockquote style='border: 2px solid rgb(102, 102, 102); padding: 10px; background-color: rgb(204, 204, 204);'><p>".$row['receiver']."</p><small>Last received message goes here...</small></blockquote></li><hr/></a>";
					$bool=1;
				}
				else
					echo "<a href='message.php?user=".$row['receiver']."'><li><blockquote><p>".$row['receiver']."</p><small>Last received message goes here...</small></blockquote></li><hr/></a>";
			}
		}
	}
	//mysqli_close($con);
	echo "</ul>";
?>
