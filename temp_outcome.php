<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Float Course </title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

  
 function floats(OutcomeNumber,Cid, ModuleName,mid)
{
	for(i=0;i<OutcomeNumber;i++)
	{
		var OutcomeName=document.getElementById('OutcomeName'+(mid*10+i)).value;
		alert(OutcomeName);
			   $.ajax({
				type: "POST",
				url: "floats.php",
				data: { OutcomeName : OutcomeName, ModuleName: ModuleName,Cid: Cid, OutcomeNumber: OutcomeNumber, Oid: i}
			}).done(function(data){
				$("#Show").html(data);
			});
	}
}

  
</script>
</head>

<body>

<?php

include_once "config.php";
	$ModuleName=$_POST['ModuleName'];
	$OutcomeNumber=$_POST['category'];
	$Cid=$_POST['Cid'];
	//echo '<script>alert("'.$Cid.'")</script>';

	$mid=$_POST['mid'];
	
	
	$query="select Mid from modules order by Mid desc";
	$result=mysqli_query($conn,$query);
	if($data=mysqli_fetch_assoc($result))
	{
		$Mid=$data['Mid']+1;
	
	}
	else
	{
		$Mid=001;
	}
	
	$query="insert into modules (Cid, Mname, NumOut, Mid) values ('$Cid','$ModuleName','$OutcomeNumber','$Mid')";
	if(!mysqli_query($conn, $query))
	{
		echo '<script>alert("TOËRROR : ".mysqli_error($conn))</script>';
	}


//$OutNum=$_POST['category'];
		for($i=0;$i<$OutcomeNumber;$i++){
			
			echo "<table width='40%'>";
			echo "<tr height='40px'>";
			echo "<td width='50%'><label class='design'>Enter Outcome ".($i+1)." Name</label></td>"; 
			echo "<td><input type='text' name='OutcomeName' id='OutcomeName".($mid*10+$i)."'> </td></tr>";
			echo "</table>";	
		}?>
		
		<button type="button" onclick="floats('<?php echo $OutcomeNumber; ?>','<?php echo $Cid; ?>','<?php echo $ModuleName; ?>','<?php echo $mid; ?>')">Submit</button>
		<hr width='60%' size='8px' style='background-color: #008080;'>
		<div id="Show"></div> 
		
		

