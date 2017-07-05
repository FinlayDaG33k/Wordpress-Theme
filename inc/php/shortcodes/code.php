<?php
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
