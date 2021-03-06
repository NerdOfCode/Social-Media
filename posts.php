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
        | <a href="/welcome.php">Home</a>
        | <a href="/logout.php">Logout</a>
        
        <hr>
        <script>
                $(document).ready(function(){
                        $('#hide').fadeOut(2500);
                })
        </script>


<?php
session_start();
include 'parsedown.php';
include 'creds.php';


$user = $_SESSION['user'];

//Parsedown functionality
$Parsedown = new Parsedown();


$db = new mysqli('localhost',$username,$password,$database2) or die("<p style=\"color:red;\"><b>Error: </b> connection to MySQL failed");
$new_query="SELECT * FROM $table2";
$result = mysqli_query($db, $new_query);



//Displays all the contents in the row comments in $table2
while($row = mysqli_fetch_array($result)){
        $info = $row['comments'];
        $head = $row['header'];
	$id =   $row['id'];
	$name = $row['name'];	
	$date = $row['date'];

        //Send the stored text through parsedown for markdown support
        echo $Parsedown->text("$head");
        echo "<hr id=\"hr\">";
	echo "$info";     
	echo "Posted on: $date"; 
        echo "<br>";
}
?>
</body>
</html>
