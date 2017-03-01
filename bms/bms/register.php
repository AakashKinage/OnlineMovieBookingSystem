<html>
<head>
<style>
div {
border:1px solid white;
border-radius:20px;
margin-left:auto;
margin-right:auto;
width:30%;
text-color:white;
}
body {
	background-image:url("red.jpg");
	
}
</style>
</head>
<body>
<font color=white>
<div>
<h1 align="center">Registration Form</h1>
<form method="post" action="register.php">
<center>
<table>

<tr>

<td><font color=white>First Name:</font ></td>

<td>

<input type="text" placeholder="Enter First Name" name="fname">*</td>

</tr>
<tr>
<td><font color=white>Last Name:</font ></td>
<td><input type="text" placeholder="Enter Last Name" name="lname"></td>
</tr>
<tr>
<td><font color=white>Email Id:</font</td>
<td><input type="text" placeholder="Enter Email Id" name="email">*</td>
</tr>
<tr>
<td><font color = white>User Name:</font></td>
<td><input type="text" placeholder="Enter User Name" name="uname">*</td>
</tr>
<tr>
<td><font color=white>Password:</font></td>
<td><input type="password" placeholder="Enter Password" name="upass">*</td>
</tr>
</table></center><br>
<center><input type="submit" value="Save" name="submit"></center>
</form>
</div>
<?php
require("dbconnect.php");

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])&& isset($_POST['uname']) && isset($_POST['upass'])){
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$uname = $_POST['uname'];
$upass = $_POST['upass'];

if($fname=="" || $email=="" || $uname=="" || $upass==""){
	
	echo "Fill details";
} else {
	$res = mysqli_query($con,"insert into customer(firstname,lastname,email,username,pass) values('{$fname}','{$lname}','{$email}','{$uname}','{$upass}')");
	if($res)
	echo "Save Successfully";
	header("Location: login.php");
}
}
?>
</font>
</body>
</html>