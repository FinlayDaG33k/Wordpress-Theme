<?php
/* [paragraph] */
function paragraph_func(){
	return "&nbsp;<br />&nbsp;<br />";
}
add_shortcode( 'paragraph', 'paragraph_func' );

/* [eduwarn] */
function eduwarn_func(){
	return "<div class=\"panel panel-danger\"><div class=\"panel-heading\"><h3 class=\"panel-title\">Disclaimer</h3></div><div class=\"panel-body\"><font color=\"red\">This post is intended for <strong>educational</strong> use only.<br />I am in no way or shape responsible for any damages done!<br />Please make sure you made adequate preperations before proceeding.</font></div></div>";
}
add_shortcode( 'eduwarn', 'eduwarn_func' );

/*
	[panel]
	arguments: title, type
	takes content
*/
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

/*
	[code]
	arguments: lang
	takes content as code
*/
function code_func($atts, $content = null){
	$a = shortcode_atts( array(
    'lang' => 'plaintext',
    'code' => $content,
  ), $atts );
	$a['code'] = preg_replace('/\s/', "", $a['code'], 2);
	$codeblock = "<pre class=\"line-numbers\"><code class=\"language-".$a['lang']."\">".htmlentities($a['code'])."</code></pre>";
	return $codeblock;
}
add_shortcode( 'code', 'code_func' );
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

/* [g33kout] */
function g33kout_func(){
	return "<br /><br />G33k Out!<br />";
}
add_shortcode( 'g33kout', 'g33kout_func' );

/*
	[url]
	arguments: url, target
	takes content as url text
*/
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

/*
	[img]
	arguments: src
	takes content as caption
*/
function img_func($atts, $content = null){
	$a = shortcode_atts( array(
		'src' => $content,
		'url' => ''
  ), $atts );

	$img = "";
	if(!empty($a['url'])){
		$img .= "<a href=\"".$a['url']."\" target=\"_blank\">";
	}else{
		$img .= "<a href=\"".$a['src']."\" target=\"_blank\">";
	}
	$img .= "<img src=\"".$a['src']."\" style=\"max-height:250px; max-width: 250px\" class=\"image-responsive\"></a>";
	return $img;
}
add_shortcode( 'img', 'img_func' );

function caption_func($atts, $content = null){
	$a = shortcode_atts( array(
		'content' => $content,
		'text' => '',
  ), $atts );
	return "<div class=\"panel panel-default panel-wrap\" style=\"width: 100%;\"><div class=\"panel-body\"><center>".$a['content']."</center></div><div class=\"panel-footer\">".$a['text']."</div></div>";
}
add_shortcode( 'caption', 'caption_func' );

/*
	[h]
	arguments:
	takes content as text
*/
function h_func($atts, $content = null){
	return "<hr><h3 class=\"text-primary\">".$content."</h3>";
}
add_shortcode( 'h', 'h_func' );


/*
	[card]
	arguments:
	takes content as cardname
*/
function card_func($atts, $content = null){
	return "<a href=\"http://gatherer.wizards.com/Pages/Card/Details.aspx?name=".$content."\" target=\"_blank\">".$content."</a>";
}
add_shortcode( 'card', 'card_func' );


/*
	Table stuff
*/
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
