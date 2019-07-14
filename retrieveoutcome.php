<?php
	include_once "config.php";
	$a=$_POST['category'];
	
	//echo '<script>alert("'.$a.'")</script>';
	$query="SELECT Cid, Mname FROM modules WHERE Mname='$a'";
	$result=mysqli_query($conn,$query);
	$data=mysqli_fetch_assoc($result);
	$Cid=$data['Cid'];
	$Mname=$data['Mname'];
	
	$query="SELECT Oname FROM outcomes WHERE Cid='$Cid' and Mname='$Mname'";
	$result=mysqli_query($conn,$query);
	echo '<select id="outcome">';
	echo '<option>Select a outcome</option>';
	echo '<div id="selectoutcome"></div>';
	while($data=mysqli_fetch_assoc($result))
	{
		$b=$data['Oname'];
		echo '<option value='.$b.'>'.$b.'</option>';
	}
	echo '</select>';
	?>