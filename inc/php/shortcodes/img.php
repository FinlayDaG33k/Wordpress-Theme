<?php
function img_func($atts, $content = null){
	$a = shortcode_atts( array(
		'src' => $content,
		'url' => '',
		'caption' => '',
  ), $atts );


  if(!empty(get_option('WatermarkURL'))){
    $url = "img=".$a['src']."&watermark=".get_option('WatermarkURL');
    $encryptedURL = openssl_encrypt($url, 'aes-256-cbc', get_option('WatermarkKey'));
    $a['src'] = get_bloginfo("template_url")."/wimg.php?image=".urlencode($encryptedURL);
  }
  $img  = "<div class=\"row\">";
	$img .= "<div class=\"col-sm-4\">";
	$img .= "<div class=\"col-sm-7 text-center\">";
  $img .= "<a href=\"".$a['src']."\" target=\"_blank\">";
  $img .= "<img class=\"img-responsive\" src=\"".$a['src']."\">";
  $img .= "</a>";

	if(!empty($a['caption'])){
		$img .= "<div class=\"caption\"><h4>".htmlentities($a['caption'])."</h4></div>";
	}
	$img .= "</div>";
	$img .= "</div>";
	$img .= "</div>";
	return $img;
}
add_shortcode( 'img', 'img_func' );
