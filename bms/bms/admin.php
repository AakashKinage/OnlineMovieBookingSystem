<html>
<head>
<script>
function done(){
var n =	document.getElementById("no").value;
if(n==""){
window.location.assign("admin.php");
}
for(var i=1;i<=n;i++){
var ip = document.createElement("input");
ip.setAttribute("type","text");
ip.setAttribute("id","m"+i);
ip.setAttribute("placeholder","Enter Movie name "+i);
document.getElementById('mname').appendChild(ip);
var b = document.createElement("br");
document.getElementById('mname').appendChild(b);
var b = document.createElement("br");
document.getElementById('mname').appendChild(b);
}
document.getElementById("done").disabled = "true";
var btn = document.createElement("input");
btn.setAttribute("type","button");
btn.setAttribute("onclick","sends("+n+")");
btn.setAttribute("value","Save");
document.getElementById('mname').appendChild(btn);
}
function sends(no){
var xmlhttp;
var str = "len="+no;
for(var i=1;i<=no;i++){
str += "&"+"mov"+i+"="+document.getElementById("m"+i).value;
}
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
    alert(xmlhttp.responseText);
    }
  }
xmlhttp.open("POST","sendmovies.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send(str);
//window.location.assign("admin.php");
}
function alloc(){
document.getElementById("no").value = "";
//document.getElementById("done").disabled = "false";
document.getElementById("mname").style.display = "none";
document.getElementById("cd").style.display = "none";
document.getElementById("sub").style.display = "inline";
}
function cdetails(){
document.getElementById("no").value = "";
//document.getElementById("done").disabled = "false";
document.getElementById("mname").style.display = "none";
document.getElementById("sub").style.display = "none";
document.getElementById("cd").style.display = "inline";
}
</script>
</head>
<body>
Enter No. of Movies you want to add: <br>
<input type="number" id="no" placeholder="Enter no. of movie"><br><br>
<input type="button" id="done" value="Done" onClick="done()">&nbsp;&nbsp
<input type="button" id="done" value="Movies currently showing" onClick="alloc()">&nbsp;&nbsp
<input type="button" id="done" value="View Customer Details" onClick="cdetails()"><br><br>
<div id="mname"></div>
<div id="sub" style="display:none">
<?php 
include "allocmovie.php";
?>
</div>
<div id="cd" style="display:none">
<?php
include "cdetails.php";
?>
</div>
</body>
</html>