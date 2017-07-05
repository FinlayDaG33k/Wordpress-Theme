<?php
function h_func($atts, $content = null){
	return "<hr><h3 class=\"text-primary\">".$content."</h3>";
}
add_shortcode( 'h', 'h_func' );
