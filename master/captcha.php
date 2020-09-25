<?php
class captcha
{
	function print_captcha()
        {
		$text = 'sibin';
		$my_img = imagecreate( 200, 50 );
		$background  = imagecolorallocate( $my_img, 245, 244, 242);
		$text_colour = imagecolorallocate( $my_img, 10, 10, 10 );
		$line_colour = imagecolorallocate( $my_img, 245, 244, 242 );
		imagestring( $my_img, 40, 60, 20, $text, $text_colour );
		imagesetthickness ( $my_img, 5 );
		imageline( $my_img, 30, 45, 165, 45, $line_colour );
		header( "Content-type: image/png" );
		imagepng( $my_img );
		imagecolordeallocate( $line_color );
		imagecolordeallocate( $text_color );
		imagecolordeallocate( $background );
		imagedestroy( $my_img );
        }
}
?>