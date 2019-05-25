<?php require_once 'uploadimg.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>upload image into webp format</title>
<style>
.img {
  display: flex;
  flex-wrap: wrap;
  background-color: #ffffff;
}
</style>
</head>
<body>
<form action="index.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
	<?php 
		if (isset($_POST['pic'])) { 
			echo $_POST['pic'];
			unset($_POST['pic']);
		}
	?>
</form>
<div class="img">
	<?php disimg(); ?>
</div>
</body>
</html>
