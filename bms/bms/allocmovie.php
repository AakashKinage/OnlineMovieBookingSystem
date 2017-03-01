<html>
<body>
<form method='post' action="allocmovie.php" enctype='multipart/form-data'>
<table>
<tr>
<th>Movie</th>
<th>Poster</th>
</tr>
<?php
require("dbconnect.php");
$c=0;
$res = mysqli_query($con,"select * from movies");
while($row=mysqli_fetch_assoc($res)){
$c++;
echo "<tr>";
echo "<td>".$row['mname']."</td>";
echo "<td><input type='file' name='image$c'></td>";
echo "</tr>";
}
?>
</table>
<input type='submit' name='submit' value='Upload'>
</form>
<?php
if(isset($_POST["submit"]))
{	
for($i=1;$i<=$c;$i++){
$image = addslashes($_FILES["image$i"]["tmp_name"]);
$name = addslashes($_FILES["image$i"]["name"]);
$image = file_get_contents($image,$name);
$image = base64_encode($image);

saveimg($image,$i);
}
}
//display();
function saveimg($image,$i){
require("dbconnect.php");
$result = mysqli_query($con,"update movies set image='$image' where mid=$i");
if($result){
echo "<br>Image Uploaded";
}
else {
echo "<br>Image Not Uploaded";
}
}
function display(){
		require("dbconnect.php");
		$res = mysqli_query($con,"select * from movies");
		while($row=mysqli_fetch_array($res)){
			echo "<img width=300 height=300 src='data:image;base64,".$row[6]."'>";
			}
		}
?>


</body>
</html>