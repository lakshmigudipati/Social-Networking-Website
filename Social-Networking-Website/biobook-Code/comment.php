<?php include ('session.php');?>
<?php
	//include ('includes/database.php');
	$conn = mysqli_connect("localhost", "root", "","biobook");
	
	if (isset($_POST['post_comment']))
	{
		$user=$_SESSION['id'];
		$content_comment=$_POST['content_comment'];
		$post_id=$_POST['post_id'];
		$user_id=$_POST['user_id'];
		$time=time();
		

		{
			mySQLi_query($conn,"INSERT INTO comments (post_id,user_id,name,content_comment,image,created)
			VALUES ('$post_id','$id','$user_id','$content_comment','$profile_picture',$time)")
			or die (mySQLi_error($conn));
			echo "<script>window.location='home.php'</script>";
		}
			
	}
	
?>