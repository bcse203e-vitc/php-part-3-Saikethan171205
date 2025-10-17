<?php
$img = imagecreatefrompng("sample.png");

if (!$img) {
    die("Failed to load image.");
}
$color = imagecolorallocate($img, 0, 0, 255);
imagestring($img, 50, 1000, 1000, "VIT Chennai", $color);
header("Content-Type: image/jpeg");
imagejpeg($img);
imagedestroy($img);
?>

