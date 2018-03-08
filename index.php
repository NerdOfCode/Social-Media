<?xml version="1.0" enoding="utf-8"?>
<!DOCTYPE html>

<?php
session_start();
if($_SESSION['status']=="1"){
	$_SESSION['logged_in']=1;
	header("Location: /welcome.php");
	exit();
}
?>
<html lang="en">
	
	<head>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	
	<body>
		
		<h1 id="center">Gate Networks</h1>
		<a href="register.php">Register</a><hr>
	
	
	
		<form action="" method="post">
			Username: &ensp;<input type="text" name="username" id="username" required></input><br><br>
			Password: &ensp;<input type="password" name="password" id="password" required></input><br><br>
			<button type="submit" id="button">Sign in</button>
		</form>
	
	
	</body>
</html>

<?php
session_start();
include 'creds.php';

$user_name = $_POST['username'];
$_SESSION['user']="$user_name";
$user_password = $_POST['password'];
$db = mysqli_connect('localhost',$username,$password,$database) or die("Error connecting to MYSQL");
$query = "SELECT password FROM $table WHERE name = \"$user_name\"";
//mysqli_query($db, $query) or die("<p class=\"text-align:center;\">Unable to access MYSQL</p>");
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$password=$row['password'];



if(password_verify($user_password, $password)){
        $_SESSION['status'] = "1";
        header("Location: /welcome.php");
	exit();
}else if(!empty($user_name)){
	echo "<p class=\"false\" style=\"color:white;text-align:center;\">invalid details</p>";
}
mysqli_close($db);















?>
