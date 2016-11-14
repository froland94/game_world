<?php
session_start();
unset($_SESSION["kod"]);
$length = mt_rand(4,7);
$odd = 97;
$odu = 122;
$evd = 65;
$evu = 90;
$i = 0;
$password = "";


$colors2=array("255,0,0","0,255,0","0,0,255");

while($i<$length)
{
    if($i%2==0)
		$character = chr(mt_rand($odd,$odu));
       // $character=chr(mt_rand($evd,$evu));
    else
       // $character = chr(mt_rand($odd,$odu));
	$character=chr(mt_rand($evd,$evu));
    $password .= $character;

    $i++;
}

$_SESSION["kod"] = $password;

header("Content-type: image/png");
$im   = imagecreatefrompng("captcha.png") or die("Cannot Initialize new GD image stream");

    $text_color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 12, 0, 5, 20, $text_color, "arial.ttf", $password);

imagepng($im);
imagedestroy($im);
unset($password);

?>