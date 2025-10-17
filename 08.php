<?php
$src = imagecreatefrompng("sample.png");
$width = imagesx($src);
$height = imagesy($src);
$new_width = 200;
$new_height = ($height / $width) * $new_width;
$new_image = imagescale($src, $new_width, $new_height);
header("Content-Type: image/jpeg");
imagejpeg($new_image);
imagedestroy($src);
imagedestroy($new_image);
?>

