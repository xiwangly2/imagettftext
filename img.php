<?php
$x = $_GET['x'];
$y = $_GET['y'];
$r = $_GET['r'];
$g = $_GET['g'];
$b = $_GET['b'];
if($x == '' || $y == '')
{
	$x = '1920';
	$y = '1080';
}
if($r == '' || $g == '' || $b == '')
{
	$r = '0';
	$g = '0';
	$b = '0';
}
header('Content-Type:image/png');
$img = @imagecreatetruecolor($x,$y);
$text_color = @imagecolorallocate($img,$r,$g,$b);
@imagepng($img);
@imagedestroy($img);
?>