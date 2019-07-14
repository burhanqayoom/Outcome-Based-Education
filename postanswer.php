<?php
	include_once "config.php";
	//$Oid=$_POST['Oid'];
	$Qid=$_POST['Qid'];
	$Sid=$_POST['Sid'];
	$radio=$_POST['radio'];
	
	
	//echo '<script>alert("'.$Qid.'")</script>';
	//echo '<script>alert("'.$Sid.'")</script>';
	//echo '<script>alert("'.$radio.'")</script>';
		
			$query1="SELECT correct FROM options WHERE Qid='$Qid'";
			$result1=mysqli_query($conn,$query1);
			$data1=mysqli_fetch_assoc($result1);
			if(!($radio == $data1['correct']))
			{
				echo '<h4> Wrong Answer! </h4>';
				$query2="SELECT fb FROM options WHERE Qid='$Qid'";
				$result2=mysqli_query($conn,$query2);
				$data2=mysqli_fetch_assoc($result2);
				$fb= $data2['fb'];
				echo $fb;
				
				
				
			}	
			else
			{
				echo '<h4> Correct  Answer! </h4>';
			}

			$query="insert into answers (Sid, Qid) values ('$Sid','$Qid')";
			if(!mysqli_query($conn, $query))
			{
				echo '<script>alert("FTSËRROR : ".mysqli_error($conn))</script>';
			}
	?>