<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
#tkt{
	border-radius:15px;
	margin-left:auto;
	margin-right:auto;
	border:2px solid black;
	width:30%;
}
a {
	
	text-decoration:none;
}
</style>
<script>
function logout(){
window.location.assign("login.php");
}
</script>
</head>
<body>
<div id="tkt">
<h1 align="center">Your Ticket</h1>
<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
echo "<center><table>";
echo "<tr>";
echo "<td>Movie Name: </td><td><strong>".$_SESSION['tm']."</strong></td></tr>";
echo "<tr><td>Movie Time: </td><td><strong>".$_SESSION['mtime']."</strong></td></tr>";
echo "<tr><td>Seat No:</td><td><strong>".$_SESSION["lsname"]."</strong></td></tr>";
echo "<tr><td>Price: </td><td><strong>&#8377 &nbsp;".$_SESSION["mony"]."</strong></td></tr>";
echo "</table></center>";
?>
</div>
<center><a href="login.php">Logout</center>
</body>
</html>