<?php
include_once "config.php";
$CourseName=$_POST['CourseName'];
$ModuleNumber=$_POST['ModuleNumber'];

	$query="select Cid from courses order by Cid desc";
	$result=mysqli_query($conn,$query);
	if($data=mysqli_fetch_assoc($result))
	{
	$Cid=preg_replace('/\D/','',$data['Cid']);
	$Cid=$Cid+1;
	$Cid=str_pad($Cid, 3, '0',STR_PAD_LEFT);
	$a=substr($data['Cid'], 0,4);
	$b=$a.$Cid;
	}
	else
	{
		$b="scis001";
	}


$query="insert into courses (Cid, Fid, Cname, NumMod) values ('$b','Fscis001','$CourseName','$ModuleNumber')";
if(!mysqli_query($conn, $query))
{
	echo "ËRROR : ".mysqli_error($conn);
}
?>