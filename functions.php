<?php
/* Navbar setup */
require_once('inc/php/wp_bootstrap_navwalker.php');

function create_nav() {
  register_nav_menu('top-menu',__( 'Top Menu Bar' ));
}
add_action( 'init', 'create_nav' );


/* Random Post Selector */
function random_add_rewrite() {
  global $wp;
  $wp->add_query_var('random');
  add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}
add_action('init','random_add_rewrite');

function random_template() {
  if (get_query_var('random') == 1) {
  	$posts = get_posts('post_type=post&orderby=rand&numberposts=1');
  	foreach($posts as $post) {
      $link = get_permalink($post);
    }
    wp_redirect($link,307);
    exit;
  }
}
add_action('template_redirect','random_template');

/* Sidebar Widget Thingy */
function wpb_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'wpb' ),
			'id' => 'sidebar-1',
			'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3><hr>',
		)
	);
}
add_action( 'widgets_init', 'wpb_widgets_init' );

/* Hide private bits */
function no_privates($where) {
  if( is_admin() ){
		 return $where;
	}

  global $wpdb;
  return " $where AND {$wpdb->posts}.post_status != 'private' ";
}
add_filter('posts_where', 'no_privates');

/* Custom Shorttags */
require('inc/php/shortcodes.php');

/* Custom Filters */
require('inc/php/filters.php');

/* Simplify logging to console */
function jslog($content){
  ?>
    <script>console.log("<?= htmlentities($content); ?>");</script>
  <?php
}
?>
