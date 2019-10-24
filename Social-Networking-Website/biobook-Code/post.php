<?php
	//include('includes/database.php');
	include('session.php');
	$conn = mysqli_connect("localhost", "root", "","biobook");
	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image = $_FILES["image"] ["name"];
	$image_name= addslashes($_FILES['image']['name']);
	$size = $_FILES["image"] ["size"];
	$error = $_FILES["image"] ["error"];

	if ($error > 0){
				die("Error uploading file! Code $error.");
			}else{
				if($size > 10000000) //conditions for the file
				{
				die("Format is not allowed or file size is too big!");
				}
				
			else
				{

			move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
			$location="upload/" . $_FILES["image"]["name"];
			$user=$_SESSION['id'];
			$content=$_POST['content'];
			$time=time();
			
			$stmt = $conn->prepare("INSERT INTO post (user_id,post_image,content,created) VALUES (?, ?, ?, ?)");

				$stmt->bind_param('ssss', $id,$location,$content,$time);

				 if (!$stmt->execute()) {
					echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
					}
			//$update=mysqli_query($conn,"INSERT INTO post (user_id,post_image,content,created) VALUES ('$id','$location','$content','$time'); ") or die (mySQLi_error($conn));

			}
				header('location:home.php');
			
			
			}
	}
?>