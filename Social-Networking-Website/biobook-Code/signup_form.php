<?php include ('session.php');?>
<?php
	//include ('includes/database.php');
	$conn = mysqli_connect("localhost", "root", "","biobook");
	if($conn)
		echo "Connected";
	else
		echo "not connected";
	
	if (isset($_POST['submit']))
	{
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$username=$_POST['username'];
		$username2=$_POST['username2'];
		$birthday=$_POST['day']."/".$_POST['month']."/".$_POST['year'];
		$gender=$_POST['gender'];
		$number=$_POST['number'];
		$email=$_POST['email'];
		$email2=$_POST['email2'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		/*
			$sql=mySQLi_query($conn,"select * from user WHERE email='$email'");
			$row=mySQLi_num_rows($sql);
			if ($row > 0)
			{
			echo "<script>alert('E-mail already taken!'); window.location='signup.php'</script>";
			}
			else if($password != $password2)
			{
			echo "<script>alert('Password do not match!'); window.location='signup.php'</script>";
			}else
		{
			*/
			$stmt = $conn->prepare("INSERT INTO user (firstname,lastname,username,username2,birthday,gender,number,email,email2,password,password2,profile_picture,cover_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

				$stmt->bind_param('sssssssssssss', $firstname,$lastname,$username,$username2,$birthday,$gender,$number,$email,$email2,$password,$password2,"231","2331");

				 if (!$stmt->execute()) {
					echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
					}
			
			//mySQLi_query($conn,"INSERT INTO user (firstname,lastname,username,username2,birthday,gender,number,email,email2,password,password2) VALUES ('$firstname','$lastname','$username','$username2','$birthday','$gender','$number','$email','$email2','$password','$password2')");
			echo "<script>alert('Account successfully created!'); window.location='signin.php'</script>";
		//}
			
	}
	header('location:index.php');
	
?>