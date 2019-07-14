<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Enroll Course </title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
function enroll(uid, dept)
{
	//console.log(ModuleNumber);
	
	var CourseName=document.getElementById('course').value;
	//alert(uid);
	//alert(dept);
		$.ajax({
            type: "POST",
            url: "enrollcourse.php",
            data: {CourseName: CourseName, uid :  uid, dept : dept}
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
					
						$url='indexstu.php?uid='.$uid;
						echo "<script>location.href='$url'</script>";
		}
	?>
	<hr width="60%" size="8px" style="background-color: #008080;">
		<h1> Enroll Course</h1>
	<hr width="60%" size="8px" style="background-color: #008080;">
	
	
	<table width="40%">
			<tr height="40px">
				<td width="50%"><label class="design">Select Course</label></td>
				<td>
					<select id="course"> 
					<option>Select a course</option>					
					<?php
						$uid=$_GET['uid'];
						//echo '<script>alert("'.$uid.'")</script>';
						include_once "config.php";
						$query="SELECT * FROM `courses` WHERE dept='$dept'";
						$result=mysqli_query($conn,$query);
						while($row = mysqli_fetch_assoc($result)) {
					  ?>
						<option value="<?php echo $row['CName']; ?>"><?php echo $row['CName']; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
		</table>
		
	<button type="button" onclick="enroll(<?php echo $uid; ?>, '<?php echo $dept; ?>')"> Submit </button>
	<hr width="60%" size="8px" style="background-color: #008080;">			
	<div id="ShowModules">
	</div>
	
	</center>
</form>
</body>
</html>
