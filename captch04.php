<?php
session_start();

$captcha = rand(1000, 9999);
$_SESSION['captcha'] = $captcha;

$image = imagecreate(70, 30);

$bg = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);

imagestring($image, 5, 10, 5, $captcha, $text_color);

header("Content-type: image/png");
imagepng($image);

imagedestroy($image);
?>

