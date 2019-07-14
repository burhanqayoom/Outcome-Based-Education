<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Home | Outcome Based Education </title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">  
</script>
</head>
<body>


			<form method="post">
			<center>
				<hr width="60%" size="8px" style="background-color: #008080;">
				<h1> Welcome Student</h1>	
				<hr width="60%" size="8px" style="background-color: #008080;">
				
				<input type="submit" value="Enroll Course" name="enroll"> 
				<input type="submit" value="Write Exam" name="exam"> 
			</center>
		
	
<?php
		
		include_once "config.php";
		$uid=$_GET['uid'];
		//echo '<script>alert("'.$uid.'")</script>';
		if(isset($_POST['enroll']))
		{
		
					//echo '<script>alert("'.$uid.'")</script>';
					
						$url='enroll.php?uid='.$uid;
						echo "<script>location.href='$url'</script>";
		}
		if(isset($_POST['exam']))
		{
		
					//echo '<script>alert("'.$uid.'")</script>';
					
						$url='exam.php?uid='.$uid;
						echo "<script>location.href='$url'</script>";
		}
		
?>

</form>
</body>
</html>
