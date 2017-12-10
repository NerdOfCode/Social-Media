<?php
session_start();

if ($_SESSION['status'] == 1){
	//Nothing needs to happen here really...


	//Basically checks if user tried to access home page and alerts they're already logged in...
	if($_SESSION['logged_in'] == 1){
		echo "<p style='color: white;' id=\"hide\">you are already logged in...</p>";
		$_SESSION['logged_in']=0;
	}

}else{
	header("Location: /404.php");
	exit();	
}

?>
