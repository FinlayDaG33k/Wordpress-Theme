<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true);
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />

<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/inc/css/bootstrap.min.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/style.css?nocache=true" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/inc/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/inc/css/prism.cssn.css" type="text/css" />
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/inc/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/inc/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.0/clipboard.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/inc/js/prism.js"></script>

<?php if(!empty(get_option('jssentryio_url'))){ ?>
  <!-- Main Raven -->
  <script src="https://cdn.ravenjs.com/3.17.0/raven.min.js" crossorigin="anonymous"></script>
  <script>
    Raven.config('<?= htmlentities(get_option('jssentryio_url')); ?>').install();
  </script>

  <!-- Raven Feedback -->
  <script>
    function handleRouteError(err) {
      Raven.captureException(err);
      Raven.showReportDialog();
    };
  </script>
<?php } ?>

<?php if(!empty(get_option('AnalyticsID'))){ ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', '<?= get_option('AnalyticsID'); ?>', 'auto');
    ga('send', 'pageview');

  </script>
<?php } ?>

<script>
(function($){
    $(document).ready(function(){
        $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
        });
    });
})(jQuery);
</script>
<?php wp_head(); ?>
