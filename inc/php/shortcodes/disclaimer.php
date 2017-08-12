<?php
function disclaimer_func($atts){
  $a = shortcode_atts( array(
    'type' => '',
  ), $atts );

  switch($a['type']){
    case "eduwarn":
      $disclaimer = "<div class=\"panel panel-danger\"><div class=\"panel-heading\"><h3 class=\"panel-title\">Disclaimer</h3></div><div class=\"panel-body\"><font color=\"red\">This post is intended for <strong>educational</strong> use only.<br />I am in no way or shape responsible for any damages done!<br />Please make sure you made adequate preperations before proceeding.</font></div></div>";
      break;
    case "opinion":
      $disclaimer = "<div class=\"panel panel-danger\"><div class=\"panel-heading\"><h3 class=\"panel-title\">Disclaimer</h3></div><div class=\"panel-body\"><font color=\"red\">This post is based around <strong>MY</strong> opinion.<br />This post might not agree with your opinions on the subject.</font></div></div>";
      break;
  }
  return $disclaimer;
}
add_shortcode( 'disclaimer', 'disclaimer_func' );
