<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Record</title>
<style>
table,th,td {
	border:1px solid black;
}
td {
text-align:center;
}
</style>
</head>
<body>
<h1 align="center">Customer Details</h1>
<?php 
require("dbconnect.php");
$res = mysqli_query($con,"select * from customer");

echo "<center><table>
<th>SR No.</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>User Name</th>
<th>Password</th>";

while($row=mysqli_fetch_array($res)){
echo "<tr>";
echo "<td>".$row['cid']."</td>";
echo "<td>".$row['firstname']."</td>";
echo "<td>".$row['lastname']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['username']."</td>";
echo "<td>".$row['pass']."</td>";
echo "</tr>";
}
echo "</table></center>"
?>
</body>
</html>