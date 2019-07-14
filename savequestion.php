<?php
	include_once "config.php";
	$Oid=$_POST['Oid'];
	$Qid=$_POST['Qid'];
	$question=$_POST['question'];
	$dropdown=$_POST['dd'];
	$option1=$_POST['option1'];
	$option2=$_POST['option2'];
	$option3=$_POST['option3'];
	$option4=$_POST['option4'];
	$fb=$_POST['fb'];
	$radio=$_POST['radio'];
	//echo '<script>alert("'.$Oid.'")</script>';
	//echo '<script>alert("'.$Qid.'")</script>';
	//echo '<script>alert("'.$question.'")</script>';
	//echo '<script>alert("'.$dropdown.'")</script>';
	//echo '<script>alert("'.$option1.'")</script>';
	//echo '<script>alert("'.$option2.'")</script>';
	//echo '<script>alert("'.$option3.'")</script>';
	//echo '<script>alert("'.$option4.'")</script>';
	//echo '<script>alert("'.$fb.'")</script>';
	echo '<script>alert("'.$radio.'")</script>';

	$query="insert into questions (Oid, Qid, question) values ('$Oid','$Qid','$question')";
	if(!mysqli_query($conn, $query))
	{
		echo '<script>alert("FTSËRROR : ".mysqli_error($conn))</script>';
	}
	$query="insert into options ( Qid, diff, opt1, opt2, opt3, opt4, correct, fb) values ('$Qid','$dropdown','$option1','$option2','$option3','$option4','$radio','$fb')";
	if(!mysqli_query($conn, $query))
	{
		echo '<script>alert("FTSËRROR : ".mysqli_error($conn))</script>';
	}
	
	?>