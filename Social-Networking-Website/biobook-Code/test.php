<?php
$conn = mysqli_connect("localhost", "root", "","biobook");

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
		$profile="sdfd";
		$cover="covering";
		
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
		$stmt = $conn->prepare("INSERT INTO user (firstname,lastname,username,username2,birthday,gender,number,email,email2,password,password2,profile_picture,cover_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

				$stmt->bind_param('sssssssssssss', $firstname,$lastname,$username,$username2,$birthday,$gender,$number,$email,$email2,$password,$password2,$profile,$cover);

				 if (!$stmt->execute()) {
					echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
					}
					
		echo "<script>alert('Account successfully created!'); window.location='signin.php'</script>";
		}
?>
<?php
$d = $_POST["username"];
$name = $_POST["password"];
$email=$_POST["email"];
$subject = "Successful sign up";
$txt = "You are successfully registered for an Social website\n Your Username is is $d\nYour Password is $name";
$headers = "From: BIOBOOk" . "\r\n" ;

mail($email,$subject,$txt,$headers);
?>