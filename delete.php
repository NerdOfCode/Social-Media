<?php
session_start();
include 'signed.php';
include 'creds.php';

//Get post id
$query = $_SERVER['QUERY_STRING'];
//Prevent other users from deleting others posts
$user = $_SESSION['user'];

$db = mysqli_connect('localhost',$username,$password,$database2) or die("Error connecting to MYSQL");
$query = "DELETE FROM $table2 WHERE id='$query' AND name='$user'";
$result = mysqli_query($db, $query);

mysqli_close($db);


header("Location: /myposts.php");
exit();






?>
