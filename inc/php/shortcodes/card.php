<?php
function card_func($atts, $content = null){
	return "<a href=\"http://gatherer.wizards.com/Pages/Card/Details.aspx?name=".$content."\" target=\"_blank\">".$content."</a>";
}
add_shortcode( 'card', 'card_func' );
