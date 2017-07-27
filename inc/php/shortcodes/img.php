<?php
function img_func($atts, $content = null){
	$a = shortcode_atts( array(
		'src' => $content,
		'url' => '',
		'caption' => '',
  ), $atts );

  $img  = "<div class=\"row\">";
	$img .= "<div class=\"col-sm-4\">";
	$img .= "<div class=\"col-sm-12 thumbnail text-center\">";
	$img .= "<img class=\"img-responsive\" src=\"".$a['src']."\">";
	if(!empty($a['caption'])){
		$img .= "<div class=\"caption\"><h4>".htmlentities($a['caption'])."</h4></div>";
	}
	$img .= "</div>";
	$img .= "</div>";
	$img .= "</div>";
	return $img;
}
add_shortcode( 'img', 'img_func' );
