<?php
require "dbconnect.php";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$seatno = $_POST['snot'];
$rs = $_POST['money'];
$_SESSION["mony"] = $rs;
$_SESSION["lsname"] = $seatno;
?>