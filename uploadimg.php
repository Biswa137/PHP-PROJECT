<?php
$target_dir = "uploads/";
$t="PB_IMG_".time();
$target_img = $target_dir.$t;
if(isset($_POST['submit'])) {
	$valid_ext = array('png','jpeg','jpg','gif');
	$extension = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
	if (!file_exists('uploads')) {
		mkdir('uploads', 0777, true);
	}
	if ($_FILES["fileToUpload"]["size"] > 5300000) {
		$_POST['pic'] = "Sorry, your file is too large. image size should not be exced 5MB";
	} else {
		if(in_array($extension,$valid_ext)){
			compressImage($_FILES["fileToUpload"]["tmp_name"],$target_img.".webp",10);
			$_POST['pic'] = "picture successfully upload";
		} else {
			$_POST['pic'] = "unsupported file type. please upload .jpeg, .jpg, .gif, .png image";
		}
	}
}
function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagewebp($image, $destination, $quality);

}
function disimg() {
	$files = glob("uploads/*.*");
	for ($i=0; $i<count($files); $i++)
	{
		$image = $files[$i];
		$supported_file = array('gif','jpg','jpeg','png','webp');
		$ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
		echo '<div style=" margin: 10px;  float: left; width: 200px; ">';
		if (in_array($ext, $supported_file)) {
			echo '<img src="'.$image .'" alt="Random image" style=" width: 100%; height: 150px; "/>'."<br /><br />";
		} else {
            continue;
		}
		echo '</div>';
	}
}
?>