<!-- Registration Page for Student -->
<?php
	session_start();
	$db = mysqli_connect("localhost","root","","db_mozilla");
	if(isset($_POST['register-s'])){
		$sid = mysql_real_escape_string($_POST['studentid']);
		$sname = mysql_real_escape_string($_POST['studentname']);
		$semail = mysql_real_escape_string($_POST['studentemail']);
		$spassword1 = mysql_real_escape_string($_POST['studentpassword1']);
		$spassword2 = mysql_real_escape_string($_POST['studentpassword2']);
	
		if($spassword1==$spassword2){
			//create user
			$spassword1=md5($spassword1);//hash password before storing for security
			$sql = "INSERT INTO student(ID,NAME,EMAIL,PASSWORD) VALUES ('$sid','$sname','$semail','$spassword1')";
			mysqli_query($db,$sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $sname;
			$_SESSION['roll'] = $sid;
			header("location: home-student.php");
		}
		else
		{
			$_SESSION['message']="The two passwords do not match";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Register, login and logout: Student</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h1>Register, login and logout: Student</h1>
	</div>
	<a href="index.php">Return</a>
	<form method="post" action="register-student.php">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="number" name="studentid" class="textInput" placeholder="Enter your Roll"></td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="studentname" class="textInput" placeholder="Enter your Full Name"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="studentemail" class="textInput" placeholder="Enter your Email"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="studentpassword1" class="textInput" placeholder="Enter Password"></td>
			</tr>
			<tr>
				<td>Confirm Password:</td>
				<td><input type="password" name="studentpassword2" class="textInput" placeholder="Retype your Password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="register-s" value="Register"></td>
			</tr>
		</table>
	</form>
</body>
</html>