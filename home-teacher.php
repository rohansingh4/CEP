<!--
->Teachers Portal
-> Contains a link to set and send questions to students. 
 -->
<?php
	session_start();
?>

<!DOCTYPE HTML> 
<html> 
<head> 
	<title>Welcome  <?php echo $_SESSION['username'];  ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">  
</head> 
<body> 

<div class="header"> 
	<h1>Teachers Portal</h1>
</div>
<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>
	<center><h1> Welcome, <?php echo $_SESSION['username'];  ?></h1></center>
	<center><a href="set_ques.php">Set Questions</a></center>	
	<center><a href="logout.php">Log Out</a></center>
</body> 
</html> 
