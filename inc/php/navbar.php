<nav class="navbar navbar-static-top navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>
		</div>
		<div class="collapse navbar-collapse navbar-responsive-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-left">
				<?php
					wp_nav_menu( array(
						'menu'              => 'primary',
						'depth'             => 7,
						'container'         => 'div',
						'container_class'   => 'navbar-collapse collapse',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
					);
					if (has_nav_menu('primary')) {
					wp_nav_menu($args);
					}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" action="<?php echo esc_url( site_url() ); ?>" role="search">
					<div class="form-group">
						<input class="form-control" name="s" placeholder="Search" type="text">
					</div>
					<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</ul>
		</div>
	</div>
</nav>
