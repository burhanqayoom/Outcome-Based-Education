<?php
	include_once "config.php";
	$Name=$_POST['Name'];
	$RegNo=$_POST['RegNo'];
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];
	$Password1=$_POST['Password1'];
	$user=$_POST['user'];
	$department=$_POST['department'];
	
	$query="select Uid from register order by Uid desc";
	$result=mysqli_query($conn,$query);
	if($data=mysqli_fetch_assoc($result))
	{
		$Uid=$data['Uid']+1;
	
	}
	else
	{
		$Uid=0;
	}
	
	$query="insert into register (Uid, Name, RegNo, Username, Password, user, department) values ('$Uid','$Name','$RegNo','$Username','$Password','$user','$department')";
	if(!mysqli_query($conn, $query))
	{
		echo '<script>alert("TOËRROR : ".mysqli_error($conn))</script>';
	}
?>