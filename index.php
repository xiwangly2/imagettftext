<?php
/*
get表单：
image=本地图像（与imageurl不能同时出现），默认=white.png（./images/white.png），可选
imageurl=远程图像（与image不能同时出现）默认=，可选
r=&g=&b=颜色r,g,b，默认r=0&g=0&b=0（范围0-255），可选
size=字体大小，默认=30（根据版本决定单位），可选
i=字体倾斜的角度，默认=0，可选
x=&y=起始文字的x、y坐标，默认x=10y=40，可选
font=字体文件，默认=./fonts/arialuni.ttf（Unicode），可选
text=文本，默认=（空白则等效直接输出背景图），可选
*/
//图像资源
$image_get = basename($_GET['image']);
$imageurl = $_GET["imageurl"];
if($image_get == "")
{
	$image_get = "white.png";
}
if($imageurl != "")
{
	$sran = uniqid("");
	$img = file_get_contents($imageurl,true);
	$info = getimagesize($imageurl);
	$mime = $info["mime"];
	if($mime == "image/png")
	{
		$filetype == ".png";
		file_put_contents("./images/download{$sran}.png",$img);
		$image_get = "download{$sran}.png";
	}
	elseif($mime == "image/jpeg")
	{
		$filetype == ".jpeg";
		file_put_contents("./images/download{$sran}.jpeg",$img);
	$image_get = "download{$sran}.jpeg";
	}
	else
	{
		$filetype == ".gif";
		file_put_contents("./images/download{$sran}.gif",$img);
		$image_get = "download{$sran}.gif";
	}
}
else
{
	$info = getimagesize("./images/".$image_get);
	$mime = $info["mime"];
}
if($mime == "image/png")
{
	$image = imagecreatefrompng("./images/{$image_get}");
}
elseif($mime == "image/jpeg")
{
	$image = imagecreatefromjpeg("./images/{$image_get}");
}
else
{
	$image = imagecreatefromgif("./images/{$image_get}");
}
//颜色
$r = $_GET["r"];
$g = $_GET["g"];
$b = $_GET["b"];
if($r == "" || $g == "" || $b == "")
{
	$r = "0";
	$g = "0";
	$b = "0";
}
$color = imagecolorallocate($image,$r,$g,$b);
//字体大小
$size = $_GET["size"];
if($size == "")
{
	$size = "30";
}
//字体倾斜的角度
$i = $_GET["i"];
if($i == "")
{
	$i = "0";
}
//起始文字的x、y坐标
$x = $_GET["x"];
$y = $_GET["y"];
if($x == "" || $y == "")
{
	$x = "10";
	$y = "40";
}
//字体文件
$font = basename($_GET['font']);
if($font == "")
{
	$font = "./fonts/arialuni.ttf";
}
//文本，使用"%0a"换行
$text = $_GET["text"];
//绘制文字
imagettftext($image,$size,$i,$x,$y,$color,$font,$text);
//输出图像资源
if($mime == "image/png")
{
	header("Content-Type: image/png; charset=utf-8");
	imagepng($image);
}
elseif($mime == "image/jpeg")
{
	header("Content-Type: image/jpeg; charset=utf-8");
	imagejpeg($image);
}
else
{
	header("Content-Type: image/gif; charset=utf-8");
	imagegif($image);
}
//删除图片以释放空间
imagedestroy($image);
if($imageurl != "")
{
	if($mime == "image/png")
	{
		unlink("./images/download{$sran}.png");
	}
	elseif($mime == "image/jpeg")
	{
		unlink("./images/download{$sran}.jpeg");
	}
	else
	{
		unlink("./images/download{$sran}.gif");
	}
}
?>
