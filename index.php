<!-- 
->Home Page of Website
->LOG IN Page for Student [For ALready registered student]
->Contains a redirect to register-php if a student wants to       registered.
->Contains a redirect for login-teacher.php if a teacher wants to log in 
-->
<?php
	session_start();
	$db = mysqli_connect("localhost","root","","db_mozilla");
	if(isset($_POST['login-s'])){
		$sid = mysql_real_escape_string($_POST['studentid']);
		$spassword1 = mysql_real_escape_string($_POST['studentpassword1']);
		$spassword1 =md5($spassword1);
		$sql = "SELECT * FROM student WHERE ID=$sid AND PASSWORD='$spassword1'";
		$result= mysqli_query($db,$sql);
		
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['roll'] = $sid;
			header("location: home-student.php"); //redirect to home page
		}else{
			$_SESSION['message'] = "Username/password combination incorrect";
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
	<form method="post" action="index.php">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="number" name="studentid" class="textInput" placeholder="Enter your Roll"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="studentpassword1" class="textInput" placeholder="Enter Password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login-s" value="Register"></td>
			</tr>
			<tr>
				<td>
					<a href="register-student.php">Register?</a>
				</td>
			</tr>
		</table>
		<a href="login-teacher.php">Click here for Teacher Log IN</a>
	</form>
</body>
</html>