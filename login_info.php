<?php
session_start();

$host = "localhost";
$username = "root";
$password = "niteshhh";
$dbname = "test";
// Create connection to the database.
$con=mysqli_connect($host,$username,$password,$dbname);

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$password_matched=false;
$result = mysqli_query($con,"SELECT password FROM login WHERE username='$_POST[username_login]'");
//echo $_POST['username_login'];
//echo $_POST['password_login'];
while($row = mysqli_fetch_array($result))
  {
        if($_POST['password_login']== $row['password'])
        {
                $password_matched=true;
                break;
        }
  }
if(!$password_matched)
{
        header('Location: login.php?query=r');
//	echo "Wrong username and password combination.";
}
else
{
		session_start();
		$_SESSION['username']=$_POST['username_login'];
        header('Location: message.php');
}
mysqli_close($con);
?>
