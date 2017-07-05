<?php
function paragraph_func(){
	return "&nbsp;<br />&nbsp;<br />";
}
add_shortcode( 'paragraph', 'paragraph_func' );
