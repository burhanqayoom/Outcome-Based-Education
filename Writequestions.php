<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Give Questions</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
function savequestion(Oid, Qid)
{
	//console.log(ModuleNumber);
	//alert(Oid);
	//alert(Qid);
	var question=document.getElementById('question').value;
	var dropdown=document.getElementById('dropdown');
	var dd=dropdown.options[dropdown.selectedIndex].value;
	var option1=document.getElementById('option1').value;
	var option2=document.getElementById('option2').value;
	var option3=document.getElementById('option3').value;
	var option4=document.getElementById('option4').value;
	var fb=document.getElementById('fb').value;
	//var radio=document.getElementById('opt').value;
	if(document.getElementById('opt1').checked)
	{
		var radio= document.getElementById('opt1').value;
	}
	if(document.getElementById('opt2').checked)
	{
		var radio= document.getElementById('opt2').value;
	}
	if(document.getElementById('opt3').checked)
	{
		var radio= document.getElementById('opt3').value;
	}
	if(document.getElementById('opt4').checked)
	{
		var radio= document.getElementById('opt4').value;
	}
  
	
		$.ajax({
            type: "POST",
            url: "savequestion.php",
            data: {Oid : Oid ,	Qid : Qid, question : question,dd: dd, option1 : option1, option2 : option2, option3 : option3, option4 : option4, fb : fb, radio: radio}
        }).done(function(data){
            $("#abc").html(data);
        });
  }  
  
  
  
  
</script>
<?php
	include_once "config.php";
	$dept=$_POST['dept'];
	//echo '<script>alert("'.$dept.'")</script>';
	$uid=$_POST['uid'];
	//echo '<script>alert("'.$uid.'")</script>';
	
	$ModuleName=$_POST['ModuleName'];
	$OutcomeName=$_POST['OutcomeName'];
	//echo '<script>alert("'.$ModuleName.'")</script>';
	//echo '<script>alert("'.$OutcomeName.'")</script>';
	
	$query="SELECT Oid FROM outcomes WHERE Oname='$OutcomeName'";
	$result=mysqli_query($conn,$query);
	$data=mysqli_fetch_assoc($result);
	$Oid=$data['Oid'];
	
	$query="select Qid from questions order by Qid desc";
	$result=mysqli_query($conn,$query);
	if($data=mysqli_fetch_assoc($result))
	{
		$Qid=$data['Qid']+1;
	
	}
	else
	{
		$Qid=0;
	}
	//echo '<script>alert("'.$Oid.'")</script>';
	//echo '<script>alert("'.$Qid.'")</script>';
	
	
  ?>
</head>
<body>
<form method="post">
  <center>
	
		<table width="40%">
			<tr height="40px">
				<td width="50%"><label class="design">Write Question</label></td>
				<td><textarea name="question" id="question" rows="4" cols="50" > </textarea></td>
			</tr>
			<tr>
				<td><label class="design">Difficulty Level</label></td>
				<td>
					<select id="dropdown">
						<option value="Low" >Low</option>
						<option value="Medium" >Medium</option>
						<option value="High" >High</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label class="design">Write Option 1</label></td>
				<td><textarea name="option1" id="option1" rows="4" cols="50" > </textarea></td>
			</tr>
			
			<tr>
				<td><label class="design">Write Option 2</label></td>
				<td><textarea name="option2" id="option2" rows="4" cols="50" ></textarea> </td>
			</tr>
			
			<tr>
				<td><label class="design">Write Option 3</label></td>
				<td><textarea name="option3" id="option3" rows="4" cols="50" ></textarea> </td>
			</tr>
			
			<tr>
				<td><label class="design">Write Option 4</label></td>
				<td><textarea name="option4" id="option4" rows="4" cols="50" ></textarea> </td>
			</tr>
			
			<tr>
				<td><label class="design">Write Feedback for Wrong Answer</label></td>
				<td><textarea name="fb" id="fb" rows="5" cols="50" ></textarea> </td>
			</tr>
			
		</table>
		<hr width="60%" size="8px" style="background-color: #008080;">	
		
		<br><label class="design">Select the right answer</label><br><br>
		<input type="radio" name="option" id="opt1" value="opt1"> Option 1
		<input type="radio" name="option" id="opt2" value="opt2">  Option 2<br>
		<input type="radio" name="option" id="opt3" value="opt3">  Option 3
		<input type="radio" name="option" id="opt4" value="opt4">  Option 4<br><br>
		
		
	<button type="button" onclick="savequestion('<?php echo $Oid; ?>', '<?php echo $Qid; ?>')"> Save </button>	
	<input type="submit" value=" Write Another Question?" name="another"> 
	<?php 
		if(isset($_POST['another']))
		{
		
					//echo '<script>alert("'.$uid.'")</script>';
					
						$url='Givequestions.php?uid='.$uid;
						echo "<script>location.href='$url'</script>";
		}
	?>
	
	<div id="abc"></div>
	
	<hr width="60%" size="8px" style="background-color: #008080;">			
	</center>
</form>
</body>
</html>
