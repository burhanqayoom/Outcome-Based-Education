<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Give Questions</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
function writequestion(uid, dept)
{
	//console.log(ModuleNumber);
	
	var ModuleName=document.getElementById('module').value;
    var OutcomeName=document.getElementById('outcome').value;
	//alert(OutcomeName);
	//alert(dept);
	
		$.ajax({
            type: "POST",
            url: "Writequestions.php",
            data: { ModuleName : ModuleName, OutcomeName :OutcomeName, uid : uid, dept : dept}
        }).done(function(data){
            $("#ShowQuestions").html(data);
        });
  }  
  function selectmodule(val)
  {
	 //alert(dept);
	  $.ajax({
            type: "POST",
            url: "retrievemodule.php",
            data: { category : val}
        }).done(function(data){
            $("#selectmodule").html(data);
        });
	  
  }
  
  
  
</script>
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
		<h1> Give Questions</h1>
	<hr width="60%" size="8px" style="background-color: #008080;">
		<table width="40%">
			<tr height="40px">
				<td width="50%"><label class="design">Select Course</label></td>
				<td>
					<select onchange="selectmodule(this.value)"> 
					<option>Select a course</option>					
					<?php
						include_once "config.php";
						$uid=$_GET['uid'];
						//echo '<script>alert("'.$uid.'")</script>';
						$query="select department from register where Uid='$uid'";
						$result=mysqli_query($conn,$query);
						$data=mysqli_fetch_assoc($result);
						$dept=$data['department'];
						//echo '<script>alert("'.$dept.'")</script>';
						
						
						$query="SELECT * FROM `courses` WHERE Fid='$uid' and dept='$dept'";
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
			
			<tr height="40px">
				<td><label class="design">Select Outcome</label></td>
				<td>
					<div id="selectoutcome"></div>
				</td>
			</tr>	
		</table>
		
	<button type="button" onclick="writequestion(<?php echo $uid; ?>,'<?php echo $dept; ?>')">Submit</button>
	<hr width="60%" size="8px" style="background-color: #008080;">			
	<div id="ShowQuestions">
	</div>
	
	</center>
</form>
</body>
</html>
