<?php
function caption_func($atts, $content = null){
	$a = shortcode_atts( array(
		'content' => $content,
		'text' => '',
  ), $atts );
	return "<div class=\"panel panel-default panel-wrap\" style=\"width: 100%;\"><div class=\"panel-body\"><center>".$a['content']."</center></div><div class=\"panel-footer\">".$a['text']."</div></div>";
}
add_shortcode( 'caption', 'caption_func' );
