<html>
<body>
<form method="post" action="try.php" enctype="multipart/form-data">
<input type="file" name="image"><input type="submit" value="Upload" name="submit">
</form>
<?php
require("dbconnect.php");
if(isset($_POST['submit']))
{
	if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
	{
		echo "Please select an image";
	}
	else {
		$image = addslashes($_FILES['image']['tmp_name']);
		$name = addslashes($_FILES['image']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		
		saveimage($name,$image);
}
}
display();
function saveimage($name,$image){
	require("dbconnect.php");
	$res = mysqli_query($con,"insert into picture(name,img) values('$name','$image')");
	if($res){
	echo "Image uploaded";
	}
	else {
		echo "Image not Uploaded";
		}
	}
	function display(){
		require("dbconnect.php");
		$res = mysqli_query($con,"select * from picture");
		while($row=mysqli_fetch_array($res)){
			echo "<img width=300 height=300 src='data:image;base64,".$row[2]."'>";
			}
		}
?>
</body>
</html>