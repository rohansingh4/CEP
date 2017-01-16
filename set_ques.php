<!--
->This page is used by the question to set and then immediately promt the question to students portal.
-->
<?php
$msg="";
	if(isset($_REQUEST['btn']))
	{
		$h1=mysql_connect("localhost","root","") or die("Connection Failed..");
		mysql_select_db("db_mozilla");
		$query="insert into quesset values('$_REQUEST[quesno]','$_REQUEST[ques]','$_REQUEST[corroptn]')";
		mysql_query($query);
		if(mysql_affected_rows()>0)
		{
			$msg="<font color=green>QUESTION REGISTERED!";
		}
		else
		{
			$msg="<font color=red>TRY AGAIN!</font>";
		}
		mysql_close($h1);
	}
?>
<html>
<head>
	<title>
		Set Questions
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h1>Set Questions</h1>
	</div>
	<form method="POST" action="set_ques.php">
		<input type="text" name="quesno" placeholder="Question Number"/>
		<br><br>
		<textarea rows="5" name="ques" cols="50" ></textarea>
		<br><br>
		<input type="text" name="corroptn" placeholder="'A', 'B', 'C', or 'D'."/>
		<br><br>
		<input type="submit" name="btn"/>
		 			<?php echo "$msg"; ?>
		</form> 
	<center><a href="home-teacher.php">Go Back</a></center>
</body>
</html>