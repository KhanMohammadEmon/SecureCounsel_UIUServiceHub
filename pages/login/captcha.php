
<?php 

session_start();

function create_capacha($text)
{

	$width = 200;
	$height = 100;
	$fontfile = "pages/login/OpenSans-Regular.ttf";

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

	$path = "pages/login/capacha.jpg";
	imagejpeg($warped_image,$path);
	imagedestroy($warped_image);
	imagedestroy($image);

	return $path;
}

$filename = session_id();
$captcha = 0;
if(count($_POST)>0){

	$number = file_get_contents($filename);
	if($_POST['number'] == $number)
	{
		$captcha = 1;

	}else{
		$captcha = 2;
		$text = rand(10000,99999);
		$myimage = create_capacha($text);
		file_put_contents($filename, $text);
	}
}else{
	$text = rand(10000,99999);
	$myimage = create_capacha($text);
	file_put_contents($filename, $text);
}


