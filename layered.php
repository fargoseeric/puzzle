<?php 
$path = "uploads/";
$image_front = $path."front1.png";
$image_front_ext = explode('.', $image_front);

$image_back = $path."back1.jpg";
$image_back_ext = explode('.', $image_back);

if($image_back_ext[1] == 'png'){
    $image_new = $path.time().".png";
} else {
    $image_new = $path.time().".jpg";
}


watermark_image($image_back, $image_new, $image_front, $image_front_ext[1], $image_back_ext[1]);

function watermark_image($image_back, $image_new, $image_front, $image_front_ext, $image_back_ext) {
	
	list($owidth,$oheight) = getimagesize($image_back);
        $width = $owidth;
        $height = $oheight;
	$im = imagecreatetruecolor($width, $height);
        if($image_back_ext == "png"){
            $img_src = imagecreatefrompng($image_back);
        } else {
            $img_src = imagecreatefromjpeg($image_back);
        }
	imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
        if($image_front_ext == "png"){
            $watermark = imagecreatefrompng($image_front);
        } else {
            $watermark = imagecreatefromjpeg($image_front);
        }
	
	list($w_width, $w_height) = getimagesize($image_front); 
        
	$pos_x = $width - $w_width; 
	$pos_y = $height - $w_height;

	imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
        if($image_back_ext == "png"){
            imagepng($im, $image_new, 9);
        } else {
            imagejpeg($im, $image_new, 100);
        }
	
	//imagedestroy($im);
	//unlink($image_back);
	return true;
}

?>

<img src="<?php echo $image_new; ?>" />