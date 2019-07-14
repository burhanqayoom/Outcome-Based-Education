<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Write Exam</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

function answers(Qid, Sid)
{
	//console.log();
	
   // alert(Qid);
	//alert(Sid);
	if(document.getElementById('opt1'+Qid).checked)
	{
		var radio= document.getElementById('opt1'+Qid).value;
	}
	if(document.getElementById('opt2'+Qid).checked)
	{
		var radio= document.getElementById('opt2'+Qid).value;
	}
	if(document.getElementById('opt3'+Qid).checked)
	{
		var radio= document.getElementById('opt3'+Qid).value;
	}
	if(document.getElementById('opt4'+Qid).checked)
	{
		var radio= document.getElementById('opt4'+Qid).value;
	}

		$.ajax({
            type: "POST",
            url: "postanswer.php",
            data: { radio: radio, Sid : Sid, Qid :Qid}
        }).done(function(data){
            $("#feedback"+Qid).html(data);
        });
  }  
  
  
</script>
</head>
<body>
<form method="post">
<center>

<?php
	include_once "config.php";
	$ModuleName=$_POST['ModuleName'];
	$uid=$_POST['uid'];
	//echo '<script>alert("'.$uid.'")</script>';
	//echo '<script>alert("'.$ModuleName.'")</script>';
	
	$query="SELECT Oid FROM outcomes WHERE Mname='$ModuleName'";
	$result=mysqli_query($conn,$query);
	
	while($data=mysqli_fetch_assoc($result))
	{
			
		$Oid=$data['Oid'];
		//echo '<script>alert("'.$Oid.'")</script>';
		$query2="SELECT Oname FROM outcomes WHERE Oid='$Oid'";
		$result2=mysqli_query($conn,$query2);
		$data2=mysqli_fetch_assoc($result2);
		$Oname=$data2['Oname'];
		
		?>

	
		<h2>Outcome :	 <?php echo $Oname; ?></h2>
	
	
		<h4>
		<?php
			$low=2;
		$med=2;
		$high=2;
			$query3="SELECT Qid, question FROM questions WHERE Oid='$Oid'";
			$result3=mysqli_query($conn,$query3);
			while($data3=mysqli_fetch_assoc($result3))
			{
				
				$check=1;
				
				$question=$data3['question'];
				$Qid=$data3['Qid'];
				//echo '<script>alert("'.$Qid.'")</script>';
				$query5="SELECT Qid FROM answers WHERE Qid='$Qid' and Sid='$uid'";
				$result5=mysqli_query($conn,$query5);
				while(($data5=mysqli_fetch_assoc($result5)))
				{
					$Qid2=$data5['Qid'];
					if(($Qid==$Qid2))
					{
						$check=0;
					}
				}
				
				
										$query4="SELECT * FROM options WHERE Qid='$Qid'";
										$result4=mysqli_query($conn,$query4);
										$data4=mysqli_fetch_assoc($result4);
							
										$diff=$data4['diff'];
										$opt1=$data4['opt1'];
										$opt2=$data4['opt2'];
										$opt3=$data4['opt3'];
										$opt4=$data4['opt4'];
										$correct=$data4['correct'];
										$fb=$data4['fb'];
										if($diff=='Low' and $low and $check)
										{
											$low--;
											//echo '<script>alert("LOW '.$low.'")</script>';
										}
										if($diff=='Medium' and $med and $check)
										{
											$med--;
											//echo '<script>alert("MED '.$med.'")</script>';
										}
										if($diff=='High' and $high and $check)
										{
											$high--;
											//echo '<script>alert("HIGH '.$high.'")</script>';
										}
										
									 
									
				if($check and ($low and $diff=='Low' or $med and $diff=='Medium' or $high and $diff=='High'))
				{
					
					//echo '<script>alert("'.$Qid.'")</script>';
					echo 'Question :';
					echo $question;?>
					<br> <br>
					</h4>
					<table width="40%">
						<tr height="40px">
							<td width="50%"><label class="design"> A : <?php echo $opt1; ?></label></td>
							<td><label class="design"> B :<?php echo $opt2; ?></label></td>
						</tr>
						<tr>
							<td><label class="design"> C :<?php echo $opt3; ?></label></td>
							<td><label class="design"> D :<?php echo $opt4; ?></label> </td>
						</tr>
					</table>
					
					<h4> Difficulty :  <?php echo $diff; ?> </h4>
		
					<br><label class="design">Select the right answer</label><br><br>
					<table width="40%">
							<tr height="40px">
								<td width="50%"><input type="radio" name="option" id="opt1<?php echo $Qid; ?>" value="opt1"> A</td>
								<td><input type="radio" name="option" id="opt2<?php echo $Qid; ?>" value="opt2">  B</td></tr>
							<tr>
								<td><input type="radio" name="option" id="opt3<?php echo $Qid; ?>" value="opt3">  C</td>
								<td><input type="radio" name="option" id="opt4<?php echo $Qid; ?>" value="opt4">  D</td></tr>
						</table>
						<br>
						<button type="button" onclick="answers(<?php echo $Qid; ?>, <?php echo $uid; ?> )"> Submit </button>
						<div id="feedback<?php echo $Qid; ?>"> </div>
						
						<hr width="60%" size="8px" style="background-color: #008080;">
						
							
							
				<?php	}			
				
			}
				
	}?>
	<hr width="60%" size="8px" style="background-color: #008080;">
	<input type="submit" value=" Write Another Test?" name="another"> 
						<?php 
							if(isset($_POST['another']))
							{
							
										//echo '<script>alert("'.$uid.'")</script>';
										
											$url='exam.php?uid='.$uid;
											echo "<script>location.href='$url'</script>";
							}
						?>
	
</center>
</form>
</body>
</html>