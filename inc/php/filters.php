<?php
function wpse_allowedtags() {
  // Add custom tags to this string
  return '<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>';
}

function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
  $raw_excerpt = $wpse_excerpt;
  if ( '' == $wpse_excerpt ) {
    $wpse_excerpt = get_the_content('');
    $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
    $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
    $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
    $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */
    //Set the excerpt word count and only break after sentence is complete.
    $excerpt_word_count = 75;
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
    $tokens = array();
    $excerptOutput = '';
    $count = 0;
    // Divide the string into tokens; HTML tags, or words, followed by any whitespace
    preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);
    foreach ($tokens[0] as $token) {
      if ($count >= $excerpt_length && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) {
        // Limit reached, continue until , ; ? . or ! occur at the end
        $excerptOutput .= trim($token);
        break;
      }
      // Add words to complete sentence
      $count++;
      // Append what's left of the token
      $excerptOutput .= $token;
    }
    $wpse_excerpt = trim(force_balance_tags($excerptOutput));
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
    return $wpse_excerpt;

  }
  return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt');
