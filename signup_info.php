<?php

if($_POST['password_signup1']!=$_POST['password_signup2'])
{
	header('Location: login.php?query=s');
    exit();
}

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
$result = mysqli_query($con,"SELECT password FROM login WHERE username='$_POST[username_signup]'");

if($row = mysqli_fetch_array($result))
{
	header('Location: login.php?query=userExists');
	mysqli_close($con);
}
else
{
	mysqli_query($con,"INSERT INTO login VALUES ('$_POST[username_signup]','$_POST[password_signup1]')");
    header('Location: login.php?query=thanksSignup');
	mysqli_close($con);
}
?>
