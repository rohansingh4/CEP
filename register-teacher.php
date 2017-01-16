<!-- Registration Page for Teacher -->
<?php
	session_start();
	$db = mysqli_connect("localhost","root","","db_mozilla");
	if(isset($_POST['register-t'])){
		$tid = mysql_real_escape_string($_POST['teacherid']);
		$tname = mysql_real_escape_string($_POST['teachername']);
		$temail = mysql_real_escape_string($_POST['teacheremail']);
		$tpassword1 = mysql_real_escape_string($_POST['teacherpassword1']);
		$tpassword2 = mysql_real_escape_string($_POST['teacherpassword2']);
	
		if($tpassword1==$tpassword2){
			//create user
			$tpassword1=md5($tpassword1);//hash password before storing for security
			$sql = "INSERT INTO teacher(ID,NAME,EMAIL,PASSWORD) VALUES ('$tid','$tname','$temail','$tpassword1')";
			mysqli_query($db,$sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $tname;
			header("location: home-teacher.php");
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
	<title>Register, login and logout: Teacher</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h1>Register, login and logout: Teacher</h1>
	</div>
	<a href="index.php">Return</a>
	<form method="post" action="register-teacher.php">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="number" name="teacherid" class="textInput" placeholder="Enter your Staff ID"></td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="teachername" class="textInput" placeholder="Enter your Full Name"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="teacheremail" class="textInput" placeholder="Enter your Email"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="teacherpassword1" class="textInput" placeholder="Enter Password"></td>
			</tr>
			<tr>
				<td>Confirm Password:</td>
				<td><input type="password" name="teacherpassword2" class="textInput" placeholder="Retype your Password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="register-t" value="Register"></td>
			</tr>
		</table>
	</form>
</body>
</html>