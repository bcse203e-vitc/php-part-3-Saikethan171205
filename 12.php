<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$img = imagecreatetruecolor(400, 60);
$bg = imagecolorallocate($img, 240, 240, 240);
imagefilledrectangle($img, 0, 0, 400, 60, $bg);
$black = imagecolorallocate($img, 0, 0, 0);
$text = "Generated on " . date("H:i:s");
imagestring($img, 5, 10, 20, $text, $black);
$border = imagecolorallocate($img, 0, 102, 204);
imagerectangle($img, 0, 0, 399, 59, $border);
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>

