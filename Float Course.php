<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Float Course </title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
function change(ModuleNumber, uid, dept)
{
	console.log(ModuleNumber);
	//alert(uid);
	//alert(dept);
	var CourseName=document.getElementById('CourseName').value;
    var ModuleNumber=document.getElementById('ModuleNumber').value;
	
		$.ajax({
            type: "POST",
            url: "temp_module.php",
            data: { category : ModuleNumber, CourseName: CourseName, ModuleNumber: ModuleNumber, uid : uid, dept : dept}
        }).done(function(data){
            $("#ShowModules").html(data);
        });
  }  
  
  
  
  
</script>
<?php
	include_once "config.php";
	$uid=$_GET['uid'];
	//echo '<script>alert("'.$uid.'")</script>';
	
	$query="select department from register where Uid='$uid'";
	$result=mysqli_query($conn,$query);
	$data=mysqli_fetch_assoc($result);
	$dept=$data['department'];
	//echo '<script>alert("'.$dept.'")</script>';
	
  ?>
</head>
<body>
<form method="post">
  <center>
	<input type="submit" value="Home" name="home"> 
	<?php 
		if(isset($_POST['home']))
		{
			
					//echo '<script>alert("'.$uid.'")</script>';
					
						$url='indexfac.php?uid='.$uid;
						echo "<script>location.href='$url'</script>";
		}
	?>
	<hr width="60%" size="8px" style="background-color: #008080;">
		<h1> Float Course</h1>
	
	
	<hr width="60%" size="8px" style="background-color: #008080;">
		<table width="40%">
			<tr height="40px">
				<td width="50%"><label class="design">Enter Course Name</label></td>
				<td><input type="text" name="CourseName" id="CourseName"> </td>
			</tr>
			<tr>
				<td><label class="design">Enter the number of Modules</label></td>
				<td><input type="text" name="ModuleNumber" id="ModuleNumber"> </td>
			</tr>
		</table>
		
	<button type="button" onclick="change(document.getElementById('ModuleNumber').value, <?php echo $uid; ?>, '<?php echo $dept; ?>')"> Submit </button>
	<hr width="60%" size="8px" style="background-color: #008080;">			
	<div id="ShowModules">
	</div>
	
	</center>
</form>
</body>
</html>
