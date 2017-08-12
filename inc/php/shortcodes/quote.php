<?php
function quote_func($atts, $content = null){
	return "<blockquote class=\"blockquote\"><p class=\"mb-0\">".$content."</p></blockquote>";
}
add_shortcode( 'quote', 'quote_func' );
