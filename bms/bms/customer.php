<html>
<head>
<style>
table,th,td {
	border:1px solid black;
	
}
span {
	cursor:pointer;
}
</style>
<script>
function myfunc(no,time,rno){
var xmlhttp;
var str = "len="+no+" &t="+time+" &rno="+rno;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("result").innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","movie.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(str);
document.getElementById("tbl").style.display = "none";
document.getElementById("book").style.display = "inline";
}
function logout(){
window.location.assign("login.php");
}
function book(){
window.location.assign("seat.php");
}
</script>
</head>
<body>
<?php
require("dbconnect.php");
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
echo "<h1 align='center'>Welcome ".$_SESSION['user']." !!!</h1><center><input type='button' onclick='logout()' value='Logout'></cemter><br><br>";
$res = mysqli_query($con,"select * from movies");
echo "<center><table id='tbl'>
<th>Movie</th>
<th>Time 1</th>
<th>Time 2</th>
<th>Time 3</th>
<th>Time 4</th>";

while($row=mysqli_fetch_array($res)){
$m = $row['mid'];

echo "<tr>";
//echo "<td>".$row['mname']."</td>";
echo "<td><img style='width:304px;height:228px;' src='data:image;base64,".$row['image']."'></td>";
echo "<td><span id='$m' onclick='myfunc(this.id,this.innerHTML,1)'>".$row['time1']."</span></td>";
echo "<td><span id='$m' onclick='myfunc(this.id,this.innerHTML,2)'>".$row['time2']."</span></td>";
echo "<td><span id='$m' onclick='myfunc(this.id,this.innerHTML,3)'>".$row['time3']."</span></td>";
echo "<td><span id='$m' onclick='myfunc(this.id,this.innerHTML,4)'>".$row['time4']."</span></td>";
echo "</tr>";
}
echo "</table></center>"
?>
<div id="result"></div>
<center><input type="button" onClick="book()" id="book" value="Book Seats For This Show" style="display:none"></center>
</body>
</html>