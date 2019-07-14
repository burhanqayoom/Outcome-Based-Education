<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Write Exam </title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
function startexam(uid)
{
	//console.log(ModuleNumber);
	
	var ModuleName=document.getElementById('module').value;
	//alert(uid);
	//alert(ModuleName);
		$.ajax({
            type: "POST",
            url: "startexam.php",
            data: {ModuleName: ModuleName, uid :uid }
        }).done(function(data){
            $("#startexam").html(data);
        });
  }  
   function selectmodule(val)
  {
	// alert(val);
	  $.ajax({
            type: "POST",
            url: "getmodule.php",
            data: { category : val}
        }).done(function(data){
            $("#selectmodule").html(data);
        });
	  
  }
  
  
  
</script>
<?php
	include_once "config.php";
  ?>
</head>
<body>
<form method="post">
  <center>
	<hr width="60%" size="8px" style="background-color: #008080;">
		<h1> Write Exam</h1>
	<hr width="60%" size="8px" style="background-color: #008080;">
		
	<table width="40%">
			<tr height="40px">
				<td width="50%"><label class="design">Select Course</label></td>
				<td>
					<select id="course" onchange="selectmodule(this.value)"> 
					<option>Select a course</option>					
					<?php
						$uid=$_GET['uid'];
						//echo '<script>alert("'.$uid.'")</script>';
						include_once "config.php";
						$query="SELECT * FROM `enrolls` WHERE Sid='$uid'";
						$result=mysqli_query($conn,$query);
						while($row = mysqli_fetch_assoc($result)) {
					  ?>
						<option value="<?php echo $row['CName']; ?>"><?php echo $row['CName']; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			
			<tr height="40px">
				<td><label class="design">Select Module</label></td>
				<td>
					<div id="selectmodule">
					</div>
				</td>
			</tr>
				
		</table>
		
	<button type="button" onclick="startexam(<?php echo $uid; ?>)"> Start Exam </button>
	<hr width="60%" size="8px" style="background-color: #008080;">			
	<div id="startexam">
	</div>
	
	</center>
</form>
</body>
</html>