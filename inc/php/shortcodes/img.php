<?php
function img_func($atts, $content = null){
	$a = shortcode_atts( array(
		'src' => $content,
		'url' => '',
		'caption' => '',
  ), $atts );

	$img = "";
	if(!empty($a['caption'])){
		$img .= "<div class=\"panel panel-default panel-wrap\" style=\"width: 100%;\"><div class=\"panel-body\"><center>";
	}
	if(!empty($a['url'])){
		$img .= "<a href=\"".$a['url']."\" target=\"_blank\">";
	}else{
		$img .= "<a href=\"".$a['src']."\" target=\"_blank\">";
	}
	$img .= "<img src=\"".$a['src']."\" style=\"max-height:250px; max-width: 250px\" class=\"image-responsive\"></a>";
	if(!empty($a['caption'])){
		$img .= "</center></div><div class=\"panel-footer\">".$a['caption']."</div></div>";
	}
	return $img;
}
add_shortcode( 'img', 'img_func' );
