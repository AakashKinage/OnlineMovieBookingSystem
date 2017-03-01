<?php
require "dbconnect.php";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$seatno = $_POST['sno'];
$color = $_POST['colour'];
$rseats = $_SESSION['rseat'];
if($color=="green")
{
mysqli_query($con,"update $rseats set color='red' where seatno='$seatno'");
}
else
{
mysqli_query($con,"update $rseats set color='white' where seatno='$seatno'");
}
?>