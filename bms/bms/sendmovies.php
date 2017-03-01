<?php 
require("dbconnect.php");

mysqli_query($con,"truncate table movies");
$no = $_POST['len'];
for($i=1;$i<=$no;$i++)
{
$mname = $_POST['mov'.$i];
$a=$mname;
for($p=1;$p<=4;$p++)
{
$mseat = str_replace(" ","",$a)."time".$p;
mysqli_query($con,"create table $mseat (sid int not null primary key auto_increment,seatno varchar(255)not null,color varchar(255)not null)");
mysqli_query($con,"insert into $mseat select * from seats");
}
mysqli_query($con,"insert into movies(mname,time1,time2,time3,time4) values('{$mname}','9:30 AM','12:30 PM','4:30 PM','8:30 PM')");
}
echo "Save Successful";
?>