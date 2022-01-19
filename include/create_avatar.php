<?php
function createAvatarImage($string)
{
 
    $imageFilePath = "images/".$string . ".png";

    //base avatar image that we use to center our text string on top of it.
    $avatar = imagecreatetruecolor(60,60);
    $bg_color = imagecolorallocate($avatar, 211, 211, 211);
    imagefill($avatar,0,0,$bg_color);
    $avatar_text_color = imagecolorallocate($avatar, 0, 0, 0);
	// Load the gd font and write 
    $font = imageloadfont('gd-files/gd-font.gdf');
    imagestring($avatar, $font, 10, 10, $string, $avatar_text_color);
    imagepng($avatar, $imageFilePath);
    imagedestroy($avatar);
 
    return $imageFilePath;
}