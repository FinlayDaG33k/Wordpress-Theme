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
  if(empty(get_option('WatermarkURL'))){
    $img .= "<img class=\"img-responsive\" src=\"".$a['src']."\">";
  }else{
    $img .= "<img class=\"img-responsive\" src=\"".get_bloginfo("template_url")."/wimg.php?img=".$a['src']."&watermark=".get_option('WatermarkURL')."\">";
  }

	if(!empty($a['caption'])){
		$img .= "<div class=\"caption\"><h4>".htmlentities($a['caption'])."</h4></div>";
	}
	$img .= "</div>";
	$img .= "</div>";
	$img .= "</div>";
	return $img;
}
add_shortcode( 'img', 'img_func' );
