<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Give Questions</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
 function selectoutcome(val)
  {
	// alert(val);
	  $.ajax({
            type: "POST",
            url: "retrieveoutcome.php",
            data: { category : val}
        }).done(function(data){
            $("#selectoutcome").html(data);
        });
	  
  }

  </script>
</head>
<body>
<?php
	include_once "config.php";
	$a=$_POST['category'];
	
	
	//echo '<script>alert("'.$dept.'")</script>';
	$query="SELECT Cid FROM courses WHERE CName='$a'";
	$result=mysqli_query($conn,$query);
	$data=mysqli_fetch_assoc($result);
	$b=$data['Cid'];
	//echo '<script>alert("'.$b.'")</script>';
	$query="SELECT Mname FROM modules WHERE Cid='$b'";
	$result=mysqli_query($conn,$query);
	echo '<select id ="module" onchange="selectoutcome(this.value)">';
	echo '<option>Select a module</option>';
	echo '<div id="selectoutcome"></div>';
	
	while($data=mysqli_fetch_assoc($result))
	{
		$b=$data['Mname'];
		echo '<option value='.$b.'>'.$b.'</option>';
	}
	echo '</select>';
	?>