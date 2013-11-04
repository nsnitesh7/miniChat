<?php
session_start();
if($_SESSION['username']==null)
	header('Location: login.php');
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
mysqli_query($con,"INSERT INTO messages VALUES ('$_SESSION[username]','$_POST[commenttext]')");
header('Location: wall.php');
mysqli_close($con);
?>
