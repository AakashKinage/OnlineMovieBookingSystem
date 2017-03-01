<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Seats</title>
<script>
var money=150,s = 0,col,cal=0;
var txt;
function get(n){
		//alert(n);
		//txt = document.getElementById("seatno");
		txt = document.getElementById("rsno");
		if(document.getElementById(n).style.background != "red")
		if(document.getElementById(n).style.background == "white"){
		document.getElementById(n).style.background = "green";
		col = "green";
		save(n,col);
		s++;
		cal = money*s;
		document.getElementById("rs").innerHTML ="Your Payment is "+cal+" &#8377&nbsp; &nbsp; &nbsp;";
		txt.innerHTML += " "+n;
		
		}
		else {
			document.getElementById(n).style.background = "white";
			col = "white";
			save(n,col);
			s--;
			cal = money*s;
			document.getElementById("rs").innerHTML = "Your Payment is "+cal+" &#8377&nbsp; &nbsp; &nbsp;";
			txt.innerHTML = txt.innerHTML.replace(n,"");
			
		}
		}
		
	function payment(){
		//alert("hii saket"+snot.innerHTML);
		
	var cno = prompt("Enter Credit/Debit Card No:");
	if(cno!=""){
		var cpass = prompt("Enter Valid PIN:");
		if(cpass!=""){
			alert("Congratulation Your Seats are Reserved..");
			//window.location.assign("ticket.php");
			ticketseat();
			window.location.assign("ticket.php");
			}
		}	
	}
	function ticketseat(){
		var xmlhttp;
		//alert(txt.innerHTML);
		var str = "snot="+txt.innerHTML;
		str += "&money="+cal;
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
    //alert(xmlhttp.responseText);
    }
  }
xmlhttp.open("POST","geticket.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(str);
	
	}
function save(n,col){
var xmlhttp;
var str = "sno="+n+" &colour="+col;
//alert(str);
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
    //alert(xmlhttp.responseText);
    }
  }
xmlhttp.open("POST","reserveseat.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(str);
	}
</script>
</head>
<body bgcolor="grey">
<?php 
require "dbconnect.php";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$mseat = str_replace(" ","",$_SESSION['tm'])."time".$_SESSION['tno'];
$_SESSION['rseat'] = $mseat;
echo "<h1>Book Seats Here</h1>";
echo "<strong id='rs'>Your Payment is 0 &#8377 &nbsp; &nbsp; &nbsp;</strong><input type='button' value='Make Payment' onclick='payment()'><strong id='seatno'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Your Seat no:<span id='rsno'></span> &nbsp;&nbsp</strong><br>";
for($i=1,$char = 'A';$i<=20,$char <= 'T';$i++,$char++)
{
	for($j=1;$j<=20;$j++)
	{
		$res = mysqli_query($con,"select color as clr from $mseat where seatno='$char$j'");
		$color = mysqli_fetch_assoc($res);
		$color = $color['clr'];
		echo "<div id='$char$j' onclick='get(this.id)' style='background:$color;border:1px solid black;width:2%;height:15px;
display:inline;float:left;'></div>";
	}
		echo "<br>";
		if($i==7 || $i==14)
		echo "<br>";
}
echo "<br><br><br>";
echo "_________________________________________________________________________<br>";
echo "|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Main Screen here&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|";

?>
</body>
</html>