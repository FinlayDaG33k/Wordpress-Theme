<?php
function eduwarn_func(){
	return "<div class=\"panel panel-danger\"><div class=\"panel-heading\"><h3 class=\"panel-title\">Disclaimer</h3></div><div class=\"panel-body\"><font color=\"red\">This post is intended for <strong>educational</strong> use only.<br />I am in no way or shape responsible for any damages done!<br />Please make sure you made adequate preperations before proceeding.</font></div></div>";
}
add_shortcode( 'eduwarn', 'eduwarn_func' );
