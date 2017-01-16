<?php

session_start();
$msg="";
	if(isset($_REQUEST['btn']))
	{
		$h1=mysql_connect("localhost","root","") or die("Connection Failed..");
		mysql_select_db("db_mozilla");
		$query="insert into answset values($_REQUEST[qnum],'$_REQUEST[optn]')";
		mysql_query($query);
		if(mysql_affected_rows()>0)
		{
			$msg="<font color=green>RESPONSE REGISTERED!";
		}
		else
		{
			$msg="<font color=red>TRY AGAIN!</font>";
		}
		mysql_close($h1);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Home: Student
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h1>Student Portal</h1>
	</div>
	<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
	?>
	
	<center><h1> Welcome, <?php echo $_SESSION['roll'];  ?></h1></center>
	
	<div>
		<?php
		$h=mysql_connect("localhost","root","") or die("Connection Failed..");
		mysql_select_db("db_mozilla");
		$query="select question_number,question from quesset;";
		$q=mysql_query($query);
		echo "<form method='post'>";
		if(mysql_affected_rows()>0)
		{
			echo "<table width='100%' align='center'>";
			echo "
					<tr>
						<th>Question Number</th>
						<th>Question</th>
					</tr>";
			while($qry= mysql_fetch_array($q))
			{
				echo "<tr><td><center>$qry[0]</center></td><td><center>$qry[1]</center></td></tr>";
			}
			
			echo "</table>";
			echo "<br><br>";
			
			echo "</form>";
			mysql_close($h);
		}
?>
	
	<form method="post" action="home-student.php">
		<fieldset>
			<legend>Enter your Responses</legend>
			<input type="text" name="qnum" placeholder="Question Number">
			<br><br>
			<input type="text" name="optn" placeholder="Option">
			<br><br>
			<input type="submit" name="btn"/>
			<?php echo "$msg" ?>
		</fieldset>
	</form>
</div>

<center><a href="index.html">Log Out</a></center>
</body>
</html>