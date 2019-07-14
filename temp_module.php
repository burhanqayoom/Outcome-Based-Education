<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Float Course </title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

  
 function outcome(mid,val)
{
	//alert(val);
	
	var ModuleName=document.getElementById('ModuleName'+mid).value;
    var OutcomeNumber=document.getElementById('OutcomeNumber'+mid).value;
	       $.ajax({
            type: "POST",
            url: "temp_outcome.php",
            data: { category : OutcomeNumber, ModuleName: ModuleName,Cid: val, mid: mid}
        }).done(function(data){
            $("#ShowOutcomes"+mid).html(data);
        });
  }

  
</script>
</head>

<body>
<?php

include_once "config.php";
$CourseName=$_POST['CourseName'];
$ModuleNumber=$_POST['ModuleNumber'];
$uid=$_POST['uid'];
$dept=$_POST['dept'];

	
	$query="select Cid from courses order by Cid desc";
	$result=mysqli_query($conn,$query);
	if($data=mysqli_fetch_assoc($result))
	{
		$Cid=$data['Cid']+1;
	
	}
	else
	{
		$Cid=001;
	}


$query="insert into courses (Cid, Fid, Cname, NumMod, dept) values ('$Cid','$uid','$CourseName','$ModuleNumber', '$dept')";
if(!mysqli_query($conn, $query))
{
	echo '<script>alert("TMËRROR : ".mysqli_error($conn))</script>';
}

$num=$_POST['category'];

echo "<h2> Modules </h2>";
echo "<hr width='60%' size='8px' style='background-color: #008080;'>";
	
for($i=0;$i<$ModuleNumber;$i++){
	
	echo "<table width='40%'>";
	echo "<tr height='40px'><td width='50%'><label class='design'>Enter Module ".($i+1)." Name</label></td><td><input type='text' name='ModuleName' id='ModuleName".($i)."'> </td></tr>";
	echo "<tr height='40px'><td width='50%'><label class='design'>Enter the number of Outcomes</label></td><td><input type='text' name='OutcomeNumber' id='OutcomeNumber".($i)."'> </td></tr>";
	echo "</table>";
	
	?>
		
	<button type="button" onclick="outcome(<?php echo $i; ?>,'<?php echo $Cid; ?>')">Submit</button>
	<div id="ShowOutcomes<?php echo $i; ?>"></div>
	
	<?php
	}?>
 
</body>
</html>