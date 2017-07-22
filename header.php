<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/inc/css/bootstrap.min.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/style.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/inc/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/inc/css/prism.cssn.css" type="text/css" />
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/inc/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/inc/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.0/clipboard.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/inc/js/prism.js"></script>

<?php if(!empty(get_option('jssentryio_url'))){ ?>
  <script src="https://cdn.ravenjs.com/3.17.0/raven.min.js" crossorigin="anonymous"></script>
  <script>
    Raven.config('<?= htmlentities(get_option('jssentryio_url')); ?>').install();
  </script>
<?php } ?>


<script type="text/javascript">
  $(document).ready(function () {
    var actualImgWidth = 0;
    $(".panel-wrap").each(function () {
			$(this).css({
     		"width": $("img", this).width() + 30,
			});
    });
  });
</script>

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
