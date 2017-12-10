<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
session_start();
include 'signed.php';
?>
	<title>Welcome to Gate Networks!!!</title>
	<link rel="stylesheet" type="text/css" href="style.css"></link>
</head>

<body>
	<h1 id="center">Gate networks</h1>
	<?php
		session_start();
		echo "User: " . $_SESSION['user'];
	?>
	| <a href="/posts.php">Posts</a>
	| <a href="/myposts.php">Your Post's</a>
	| <a href="" id="new">New Post</a>
	| <a href="/logout.php">Logout</a>
	
	<hr>
	<script>
		//When the create post link is clicked it will open in a new window according to code below
		$("a#new").click(function(){
			window.open("https://socialmedia.nerdofcode.com/create_post.php", "_blank", "toolbar=yes,top=100,left=200,width=400,height=450");
		});
		$(document).ready(function(){
			$('#hide').fadeOut(2500);
		})
	</script>

	<p>Hey there!!!</p>

	<p>The database is not 100% fully functional</p>





<?php

/*include 'creds.php';
include 'parsedown.php';
//Parsedown functionality
$Parsedown = new Parsedown();


$db = new mysqli('localhost',$username,$password,$database2) or die("<p style=\"color:red;\"><b>Error: </b> connection to MySQL failed. Please re-enter information and try again.</p>");
$new_query="SELECT * FROM $table2";
$result = mysqli_query($db, $new_query);

//Displays all the contents in the row comments in $table2
while($row = mysqli_fetch_array($result)){
	$info = $row['comments'];
	echo $Parsedown->text("$info");
	
	echo "<br>";
}

mysqli_close($db);
*/

?>                            




</body>


</html>
