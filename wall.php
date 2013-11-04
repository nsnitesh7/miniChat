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

$result = mysqli_query($con,"SELECT * FROM messages");

$s="<head>
		<title>Hosting Site</title>
		<link href = 'css/bootstrap.css' rel = 'stylesheet'>
		<link href = 'css/bootstrap-responsive.css' rel = 'stylesheet'>
		<link href = 'css/style.css' rel = 'stylesheet'>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
		<script src='js/bootstrap.js'></script>
</head>";

$hero_start="<div class='hero-unit centered'>";
$hero_end="</div>";

$button="    <form class='navbar-form' action='comment_post.php' method='post' >
    <input name='commenttext' type='text' class='span2'>
    <button type='submit' class='btn'>Submit</button>
    </form>";

$output="<html>";
$output=$output.$s;
$output=$output."<body>".$hero_start;
while($row = mysqli_fetch_array($result))
{
	$output=$output."<span class='badge'>".$row['username']."</span> : "."<span class='label label-success'>".$row['message']."</span><br><br>";
}

$output=$output.$button;
$output=$output.$hero_end."</body><br>";
$output=$output."</html><br>";
echo $output;
mysqli_close($con);
?>

