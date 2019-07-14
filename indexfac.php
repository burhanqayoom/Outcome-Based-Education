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
<?php 
$uid=$_GET['uid'];
//echo '<script>alert("'.$uid.'")</script>';
?>
			<form method="post">
			<center>
				<hr width="60%" size="8px" style="background-color: #008080;">
				<h1> Welcome Faculty</h1>	
				<hr width="60%" size="8px" style="background-color: #008080;">
				
				<input type="submit" value="Float Course" name="float"> 
				<input type="submit" value="Give Questions" name="give"> 
				
			</center>
			
	<?php
		
		include_once "config.php";
		if(isset($_POST['float']))
		{
		
					//echo '<script>alert("'.$uid.'")</script>';
					
						$url='Float%20Course.php?uid='.$uid;
						echo "<script>location.href='$url'</script>";
		}
		if(isset($_POST['give']))
		{
		
					//echo '<script>alert("'.$uid.'")</script>';
					
						$url='Givequestions.php?uid='.$uid;
						echo "<script>location.href='$url'</script>";
		}
		
?>
</form>
</body>
</html>
