<?php
function table_table_func($atts, $content = null){
	return "<table class=\"table table-striped table-hover \">" . do_shortcode($content) . "</table>";
}
add_shortcode( 'table', 'table_table_func' );

function table_thead_func($atts, $content = null){
	return "<thead>" . do_shortcode($content) . "</thead>";
}
add_shortcode( 'thead', 'table_thead_func' );

function table_tbody_func($atts, $content = null){
	return "<tbody>" . do_shortcode($content) . "</tbody>";
}
add_shortcode( 'tbody', 'table_tbody_func' );

function table_th_func($atts, $content = null){
	return "<th>" . do_shortcode($content) . "</th>";
}
add_shortcode( 'th', 'table_th_func' );

function table_tr_func($atts, $content = null){
	return "<tr>" . do_shortcode($content) . "</tr>";
}
add_shortcode( 'tr', 'table_tr_func' );

function table_td_func($atts, $content = null){
	return "<td>" . do_shortcode($content) . "</td>";
}
add_shortcode( 'td', 'table_td_func' );
