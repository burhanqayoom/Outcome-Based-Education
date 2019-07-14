<?php
	include_once "config.php";
	$CourseName=$_POST['CourseName'];
	$uid=$_POST['uid'];
	
	echo '<script>alert("'.$CourseName.'")</script>';
	$query="SELECT Cid FROM courses WHERE CName='$CourseName'";
	$result=mysqli_query($conn,$query);
	$data=mysqli_fetch_assoc($result);
	$b=$data['Cid'];
	

	$query="insert into enrolls (Sid, Cid, CName) values ('$uid','$b','$CourseName')";
	if(!mysqli_query($conn, $query))
	{
		echo '<script>alert("FTSËRROR : ".mysqli_error($conn))</script>';
	}
	?>