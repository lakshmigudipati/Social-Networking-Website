<?php

//include('includes/database.php');
$conn = mysqli_connect("localhost", "root", "","biobook");
$get_id =$_GET['id'];
	
	// sending query
	mysqli_query($conn,"DELETE FROM comments WHERE comment_id = '$get_id'")
	or die(mysqli_error());  	
	header("Location: home.php");

?>
