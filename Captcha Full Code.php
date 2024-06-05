
<?php 

session_start();

function create_capacha($text)
{

	$width = 200;
	$height = 100;
	$fontfile = "OpenSans-Regular.ttf";

	$image = imagecreatetruecolor($width, $height);

	$white = imagecolorallocate($image, 255, 255, 255);
	$black = imagecolorallocate($image, 0, 0, 0);

	imagefill($image, 0, 0, $white);
	imagettftext($image, 25, rand(-20,20), $width/4, 60, $black, $fontfile, $text);

	$warped_image = imagecreatetruecolor($width, $height);
	imagefill($warped_image, 0, 0, imagecolorallocate($warped_image, 255, 255, 255));

	for ($x=0; $x < $width; $x++) { 
		# code...
		for ($y=0; $y < $height; $y++) { 
			# code...
			$index = imagecolorat($image, $x, $y);
			$color_comp = imagecolorsforindex($image, $index);

			$color = imagecolorallocate($warped_image, $color_comp['red'], $color_comp['green'], $color_comp['blue']);

			$imageX = $x;
			$imageY = $y + sin($x / 10) * 10;

			imagesetpixel($warped_image, $imageX, $imageY, $color);
		}
	}

	$path = "capacha.jpg";
	imagejpeg($warped_image,$path);
	imagedestroy($warped_image);
	imagedestroy($image);

	return $path;
}

$filename = session_id();
echo "File : $filename";

if(count($_POST)>0){

	$number = file_get_contents($filename);
	if($_POST['number'] == $number)
	{
		// echo "<div style='margin:auto;width:300px;text-align:center;padding:10px;'>you are correct!</div>";
		// //redirect or check if other details are correct
		header("location: index2.php");

	}else{
		echo "<div style='margin:auto;width:300px;text-align:center;padding:10px;'>capacha is wrong</div>";
		$text = rand(10000,99999);

		$myimage = create_capacha($text);
		file_put_contents($filename, $text);
	}
}else{

	$text = rand(10000,99999);

	$myimage = create_capacha($text);
	file_put_contents($filename, $text);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<form method="post" style="margin:auto;width: 300px;box-shadow: 0px 0px 10px #aaa;padding: 1em;">
		<input type="text" name="number" placeholder="Captcha" style="padding:10px; border: solid thin #aaa; border-radius: 5px;"><br>
		<input type="submit" value="Check" style="padding:10px; border: solid thin #aaa; border-radius: 5px;margin-top:5px;">
	<br>
	<img src="capacha.jpg" style="width:150px;">
	</form>
	
</body>
</html>