<?php
$width = Config::get('lucbu-laravelcaptcha.width');
$height = Config::get('lucbu-laravelcaptcha.height');
$im = imagecreate($width, $height);

//background-color and text-color
$bg = imagecolorallocate($im, Config::get('lucbu-laravelcaptcha.background-color.red'), Config::get('lucbu-laravelcaptcha.background-color.green'), Config::get('lucbu-laravelcaptcha.background-color.blue'));
$textcolor = imagecolorallocate($im, Config::get('lucbu-laravelcaptcha.text-color.red'), Config::get('lucbu-laravelcaptcha.text-color.green'), Config::get('lucbu-laravelcaptcha.text-color.blue'));

$lineSpace = Config::get('lucbu-laravelcaptcha.space-grid');
if(Config::get('lucbu-laravelcaptcha.grid')){
    for($h=1;$h<$width;$h+=$lineSpace){
        $color = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
        imageline($im , $h , 0 , $h , $height , $color);
    }
    for($k=1;$k<$height;$k+=$lineSpace){
        $color = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
        imageline($im , 0 , $k , $width , $k , $color);
    }
}

imagestring($im, 5, 2, 2, $captcha, $textcolor);


if(Config::get('lucbu-laravelcaptcha.line')){
    $nbLine=rand(2,6);
    for($i=0;$i<$nbLine;$i++){
        $x1 = rand(0,$width); $x2 = rand(0,$width);
        $y1 = rand(0,$height);$y2 = rand(0,$height);
        $color = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
        imageline($im , $x1 , $y1 , $x2 , $y2 , $color);
    }
}

imagefilter($im, IMG_FILTER_SMOOTH, 20);

imagepng($im);
imagedestroy($im);
?>
