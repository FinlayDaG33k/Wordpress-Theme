<?php
function url_func($atts, $content = null){
	$a = shortcode_atts( array(
    'src' => '',
		'target' => '_self',
		'text' => $content,
  ), $atts );
	$url = "<a ";
	if(!empty($a['src'])){
		$url .= "href=\"" . htmlentities($a['src']) . "\"";
	}
	if(!empty($a['target'])){
		$url .= "target=\"" . htmlentities($a['target']) . "\"";
	}

	$url .= ">";
	if(!empty($a['text'])){
		$url .= $a['text'];
	}
	$url .= "</a>";
	return $url;
}
add_shortcode( 'url', 'url_func' );
