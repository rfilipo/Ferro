<?php
session_start();

$number = rand(1,999); //generate a random integer
$_SESSION['captcha'] = $number; //store in session variable
	 
$img_number = imagecreate(40,25);
$backcolor = imagecolorallocate($img_number,0xcc,0xcc,0xcc);
$textcolor = imagecolorallocate($img_number,55,55,55);

imagefill($img_number,0,0,$backcolor);

imagestring($img_number,10,5,5,$number,$textcolor);

header("Content-type: image/jpeg");
imagejpeg($img_number);
?>
