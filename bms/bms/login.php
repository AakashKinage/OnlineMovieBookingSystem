<html>
<head>
<style>
div {
margin-top:15%;
border:1px solid black;
border-radius:20px;
margin-left:auto;
margin-right:auto;
width:30%;
}
a{
text-decoration:none;
}
body {
	background-image:url("popcorn.jpg");
	background-image:
}
</style>
</head>
<body>
<h1 align="center">CINEMA HUB</h1>
<div>
<h2 align="center">Login</h2>
<form method="post" action="login.php">
<center>
<table>
<tr>
<td>Username: </td>
<td><input type="text" placeholder="Enter Username" name="username"></td>
</tr>
<tr>
<td>Password: </td>
<td><input type="password" placeholder="Enter Password" name="pass"></td>
</tr>
</table></center>
<center><input type="submit" value="Submit"></center>
</form>
</div>
<?php 
require("dbconnect.php");
if(isset($_POST['username']) && isset($_POST['pass'])){
$username = $_POST['username'];
$userpass = $_POST['pass'];
if($username=="admin" && $userpass=="admin"){
header("Location: admin.php");
}
else if($username=="" && $userpass==""){
echo "Enter Valid Details";	
}
else if($username!=="" && $userpass!==""){
$res=mysqli_query($con,"select * from customer where username='$username' AND pass='$userpass'");
$row = mysqli_num_rows($res);
if($row>0){
	session_start();
	$name = mysqli_query($con,"select firstname as f from customer where username='$username'");
	$getname = mysqli_fetch_assoc($name);
	$_SESSION['user'] = $getname['f'];
	header("Location: customer.php");
	
}
else {
	echo "Invalid Credentials";
}
}
}
?>
<center><h3><a href="register.php">Sign Up</a></h3></center>
</body>
</html>