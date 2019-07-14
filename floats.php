<?php


include_once "config.php";
	$ModuleName=$_POST['ModuleName'];
	$OutcomeName=$_POST['OutcomeName'];
	$OutcomeNumber=$_POST['OutcomeNumber'];
	$Cid=$_POST['Cid'];
	//$Oid=$Cid*10+$_POST['Oid'];
	$query="select Oid from outcomes order by Oid desc";
	$result=mysqli_query($conn,$query);
	if($data=mysqli_fetch_assoc($result))
	{
		$Oid=$data['Oid']+1;
	
	}
	else
	{
		$Oid=0;
	}
	
	
	$query="insert into outcomes (Cid, Mname, Oname, Oid) values ('$Cid','$ModuleName','$OutcomeName', '$Oid')";
	if(!mysqli_query($conn, $query))
	{
		echo '<script>alert("FTSËRROR : ".mysqli_error($conn))</script>';
	}
	
	?>