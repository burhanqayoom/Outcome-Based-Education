<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Register | Outcome Based Education </title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
function register()
{
	//console.log(ModuleNumber);
	
	var Name=document.getElementById('name').value;
    var RegNo=document.getElementById('regno').value;
	var Username=document.getElementById('username').value;
    var Password=document.getElementById('password').value;
	var Password1=document.getElementById('password1').value;
	var usertype=document.getElementById('user');
	var user=usertype.options[usertype.selectedIndex].value;
	var dept=document.getElementById('dropdown');
	var department=dept.options[dept.selectedIndex].value;
	//alert(user);
	//alert(department);
	
		$.ajax({
            type: "POST",
            url: "submit_reg.php",
            data: {Name : Name, RegNo : RegNo, Username : Username, Password : Password, Password1 : Password1, user : user, department :department}
        }).done(function(data){
            $("#ShowModules").html(data);
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
		<h1> New User Registration</h1>
	
	
	<hr width="60%" size="8px" style="background-color: #008080;">
		<table width="40%">
			<tr height="40px">
				<td width="50%"><label class="design">Enter Name</label></td>
				<td><input type="text" name="name" id="name" required> </td>
			</tr>
			<tr height="40px">
				<td><label class="design">Enter Registration Number</label></td>
				<td><input type="text" name="regno" id="regno" required> </td>
			</tr>
			<tr  height="40px">
				<td><label class="design">Choose User Type</label></td>
				<td>
					<select id="user">
						<option value="def">Select User Type</option>
						<option value="faculty" >Faculty</option>
						<option value="student" >Student</option>
					</select>
				</td>
			</tr>
			<tr  height="40px">
				<td><label class="design">Choose Department</label></td>
				<td>
					<select id="dropdown">
						<option value="def">Select Your Department</option>
						<option value="scis" >SCIS</option>
						<option value="hum" >Humanities</option>
						<option value="life" >Life Sciences</option>
						<option value="chem" >Chemistry</option>
					</select>
				</td>
			</tr>
			<tr  height="40px">
				<td><label class="design">Enter Username</label></td>
				<td><input type="text" name="username" id="username" required /> </td>
			</tr>
			<tr  height="40px">
				<td><label class="design">Enter Password</label></td>
				<td><input type="password" name="password" id="password" required> </td>
			</tr>
			<tr  height="40px">
				<td><label class="design">Confirm Password</label></td>
				<td><input type="password" name="password1" id="password1" required> </td>
			</tr>
		</table>
		
	<button type="button" onclick="register()"> Submit </button>
	<button type="button" onclick="document.location.href='login.php'"> Already registered? </button>
	<hr width="60%" size="8px" style="background-color: #008080;">			
	<div id="ShowModules">
	</div>
	
	</center>
</form>
</body>
</html>
