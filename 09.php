<?php
$img = imagecreate(250, 250);
$bg_color = imagecolorallocate($img, 255, 255, 255); 
for ($i = 0; $i < 10; $i++) {
    $color = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
    $x = rand(25, 225);
    $y = rand(25, 225);
    imagefilledellipse($img, $x, $y, 50, 50, $color);
}
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>

