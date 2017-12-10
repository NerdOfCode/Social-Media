<?php
session_start();
if($_SESSION['status'] == 1){
	header("Location: /welcome.php");
	$_SESSION['logged_in']=1;
	exit();
}

//Reset all session variables because user visited register page
//session_destroy();


?>
<!DOCTYPE html>
<html>


	<head>
		<title>Gate Networks Register</title>
		<link rel="stylesheet" type="text/css" href="style.css"></link>
	</head>
	<body>
		<h1 id="center">Register Now</h1>
		<a href="index.php">Home</a><hr>
		<form action="" method="post">
			Username: &ensp;<input name="username" type="text" id="username" maxlength="15" required></input><br><br>
			Password: &ensp;<input name="upassword" type="password" id="password" maxlength="45" required></input><br><br>
			<button type="submit" id="button">Register</button>
		</form>


	</body>
<?php
session_start();
include 'creds.php';
$user_name = $_POST['username'];
$_SESSION['check_user'] = $user_name;
$upassword = $_POST['upassword'];

//Prevent sql injection --> W.I.P
//$user_name = mysqli_real_escape_string($db, $user_name);
//$upassword = mysqli_real_escape_string($db, $upassword);

$db = new mysqli('localhost',$username,$password,$database) or die("Cannot connect to MySQL");
$new_query="SELECT * FROM $table";
$result = mysqli_query($db, $new_query);

//Check pass length and ensure its long enough
if(! empty($upassword)){
	if(strlen($upassword) < 6){
		echo "Your password is too short for today's society...<br>";
		echo "The username may also be taken...";
		exit();
	}
}




//Once username is filled and submitted begin the check for an already current username
if(! empty($_SESSION['check_user'])){
	while($row = mysqli_fetch_array($result)){
        	if($row['name']=="$user_name"){
			echo "Username is taken...";
			exit();
		}
	}
}



//Hash password for security reasons
$upassword = password_hash("$upassword", PASSWORD_DEFAULT);

//Check once more to prevent unnamed users which causes lots of bugs... TRUST ME!!!
if(! empty($user_name)){
	$newuser = "INSERT INTO $table VALUES ('',\"$user_name\",\"$upassword\",'')";	
	$result = mysqli_query($db, $newuser);
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$record_ip = "UPDATE users SET IP=\"$ip\" WHERE name=\"$user_name\"";

$result = mysqli_query($db, $record_ip);





mysqli_close($db);

//Reset all session variables to ensure no automatic redirection
//session_unset();
//session_destroy();



//Redirect to login page to limit attempts
if(! empty($user_name)){
	//For new user guidance
	$_SESSION['first_time']=1;
	header("Location: /index.php");
	exit();
}



?>


</html>
