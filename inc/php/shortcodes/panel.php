<?php
function panel_func($atts, $content = null) {
	$a = shortcode_atts( array(
    'title' => '',
    'body' => $content,
		'type' => 'default',
  ), $atts );

	$panel = "<div class=\"panel panel-".$a['type']."\">";
	if(!empty($a['title'])){
		$panel .= "<div class=\"panel-heading\"><h3 class=\"panel-title\">".$a['title']."</h3></div>";
	}
	if(!empty($a['body'])){
		$panel .= "<div class=\"panel-body\">".preg_replace( '#^\s*(<br\s*/?>\s*)+#i', '', $a['body'])."</div>";
	}

	$panel .= "</div>";

	return $panel;
}
add_shortcode( 'panel', 'panel_func' );
