<?php
function h_func($atts, $content = null){
	return "<hr><h3 class=\"text-primary\">".$content."</h3>";
}
add_shortcode( 'h', 'h_func' );

function sh_func($atts, $content = null){
	return "<h4 class=\"text-primary\">".$content."</h4>";
}
add_shortcode( 'sh', 'sh_func' );
