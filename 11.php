<?php
$img = imagecreate(200, 200);
$background = imagecolorallocate($img, 255, 255, 255);
for ($i = 0; $i < 200; $i++) {
    $color = imagecolorallocate($img, $i, $i, 255);
    imageline($img, $i, 0, $i, 200, $color);
}
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>

