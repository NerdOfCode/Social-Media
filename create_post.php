<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
session_start();
include 'signed.php';
?>
        <title>Make a post!!!</title>
        <link rel="stylesheet" type="text/css" href="style.css"></link>
</head>

<body>
        <h1 id="center">Gate networks</h1>
        <hr>
        <script>
                $(document).ready(function(){
                        $('#hide').fadeOut(2500);
                })

	
        </script>


	What's on your mind?<br><br> 

	<form action="" method="post">
	
		Title: <input type="text" name="header" id="header" maxlength="50" required></input><br><br>
		<textarea style="width: 300px; height: 100px;" name="textareainfo" maxlength="500" required>
		</textarea><br>
	
		<input type="submit" id="button"></input>

	</form>
	<script>
		//Automatically place cursor in header field
                var input = document.getElementById("header");
                input.focus();
        
	</script>


<?php
session_start();
include 'creds.php';
//Collect and organize important session variables
$user_name = $_SESSION['user'];

//Collect page variables
$text = $_POST['textareainfo'];
$head = $_POST['header'];
$date = date("Y/m/d");

//If user input empty alert
if(empty($head) || empty($text)){
	echo "<p style='color:red;'>Please enter a header</p>";
	echo "<p style='color:red;'>Or a body</p>";
}


//Sanitize user inputs to prevent users from taking advantage of html...


//From: http://ulyssesonline.com/2011/10/19/sanitize-your-input-in-php/
function sanitize($in) {
 return addslashes(htmlspecialchars(strip_tags(trim($in))));
}
$text = sanitize($text);
$head = sanitize($head);

//Prevent SQL injections --> W.I.P.
//$text = mysql_real_escape_string($text);
//$head = mysql_real_escape_string($head);






$db = new mysqli('localhost',$username,$password,$database2) or die("Cannot connect to MySQL");
$new_query="INSERT INTO $table2 VALUES('','<h1 id=\'comment\'>$head</h1>','<p id=\'comment\'>$text</p>','$date','$user_name')";
if(! empty($text)){
	$result = mysqli_query($db, $new_query);
	
	//close the mini window after submit
	echo "<script>window.close();</script>";

	//Redirect user back to their post's page to slow down repeated posts...
	//header("Location: /myposts.php");
	//exit();
}

?>










</body>
</html>
