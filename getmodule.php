<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Write Exam</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
 
  </script>
</head>
<body>
<?php
	include_once "config.php";
	$a=$_POST['category'];
	
	//echo '<script>alert("'.$a.'")</script>';
	$query="SELECT Cid FROM courses WHERE CName='$a'";
	$result=mysqli_query($conn,$query);
	$data=mysqli_fetch_assoc($result);
	$b=$data['Cid'];
	//echo '<script>alert("'.$b.'")</script>';
	$query="SELECT Mname FROM modules WHERE Cid='$b'";
	$result=mysqli_query($conn,$query);
	echo '<select id ="module">';
	echo '<option>Select a module</option>';
	
	
	while($data=mysqli_fetch_assoc($result))
	{
		$b=$data['Mname'];
		echo '<option value='.$b.'>'.$b.'</option>';
	}
	echo '</select>';
	?>