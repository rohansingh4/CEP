<!-- 
->LogIN page for teachers. [Registered Teacbers]
->Has a link to redirect to register-teacher.php which allows teachers to register
 -->
<?php
	session_start();
	$db = mysqli_connect("localhost","root","","db_mozilla");
	if(isset($_POST['login-t'])){
		$_SESSION['message'] = "";
		$tid = mysql_real_escape_string($_POST['teacherid']);
		$tpassword1 = mysql_real_escape_string($_POST['teacherpassword1']);
		$tpassword1 =md5($tpassword1);
		$sql = "SELECT * FROM teacher WHERE ID=$tid AND PASSWORD='$tpassword1'";
		$result= mysqli_query($db,$sql);
		
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $tid;
			header("location: home-teacher.php"); //redirect to home page
		}else{
			$_SESSION['message'] = "Username/password combination incorrect";
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
	<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
<a href="index.php">Log Out</a>
	<form method="post" action="login-teacher.php">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="number" name="teacherid" class="textInput" placeholder="Enter your Staff ID"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="teacherpassword1" class="textInput" placeholder="Enter Password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login-t" value="Log IN"></td>
			</tr>
			<tr>
				<td>
					<a href="register-teacher.php">Register?</a>
				</td>
			</tr>
		</table>

	</form>
</body>
</html>