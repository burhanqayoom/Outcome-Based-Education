<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Outcome Based Education </title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">  
</script>

</head>
<body>
<form method="post">
  <center>
	<hr width="60%" size="8px" style="background-color: #008080;">
		<h1> Login</h1>
	
	
	<hr width="60%" size="8px" style="background-color: #008080;">
		<select name="type1">
			<option></option>
			<option value="Faculty"> Faculty </option>
			<option value="Student"> Student </option>
		</select>
		<table width="40%">
			
			<tr height="40px">
				<td width="50%"><label class="design">Enter Username</label></td>
				<td><input type="text" name="username" id="username"> </td>
			</tr>
			<tr>
				<td><label class="design">Enter Password</label></td>
				<td><input type="password" name="password" id="password"> </td>
			</tr>
		</table>
		
	<input type="submit" value="LOGIN!" name="submit"> 
	<button type="button" onclick="document.location.href='register.php'"> New User </button>
	<hr width="60%" size="8px" style="background-color: #008080;">
	
	<?php
	include_once "config.php";
	if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];

		$query="select * from register where Username='$username'";
		$result=mysqli_query($conn,$query);
		while($data=mysqli_fetch_assoc($result))
		{
			$uname=$data['Username'];
			$pass=$data['Password'];
			$user=$data['user'];
			$uid=$data['Uid'];
			if($uname==$username and $pass==$password)
			{
				//echo '<script>alert("'.$uname.'")</script>';
				//echo '<script>alert("'.$pass.'")</script>';
				
				
				//foreach($_POST['type1'] as $val)
				{
					$value=$_POST['type1'];
					//echo '<script>alert("'.$value.'")</script>';
					if($value=='Faculty' and $user=='faculty')
					{
						$url='indexfac.php?uid='.$uid;
						echo "<script>location.href='$url'</script>";
					}
					if($value=='Student' and $user=='student')
					{
						
						$url='indexstu.php?uid='.$uid;
						echo "<script>location.href='$url'</script>";
					}
				}
				
				
				
				
			}
			else
			{
				echo '<script>alert("Wrong Username or Password!")</script>';
			}
		}
	}?>
	
	
	
	</center>
</form>
</body>
</html>
