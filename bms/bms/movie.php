<html>
<head>
</head>
<body>
<?php 
require("dbconnect.php");
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$no = $_POST['len'];
$time = $_POST['t'];
$_SESSION['tno'] = $_POST['rno'];
//echo $no;
$res = mysqli_query($con,"select mname m from movies where mid=$no");
$pic = mysqli_query($con,"select image p from movies where mid=$no");
$getm = mysqli_fetch_assoc($res);
$getp = mysqli_fetch_assoc($pic);
$_SESSION['tm'] = $getm['m'];
$_SESSION['mtime'] = $time;
echo "<h1 align='center'>".$getm['m']." ($time)"."</h1><br>";
echo "<center><img width=500 height=500 src='data:image;base64,".$getp['p']."'></center>";
//echo "<center><a href='seat.php' style='text-decoration:none'>Book Seats For This Show</a></center>";
?>
</body>
</html>