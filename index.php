<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
	<head profile="http://gmpg.org/xfn/11">
		<?php get_header(); ?>
	</head>

	<body>
			<?php include('inc/php/navbar.php'); ?>
			<div class="container-fluid">
				<div class="wrapper">
					<div class="row">
						<div class="left col-md-9" id="main">
		          <div class="container-fluid">
								<?php
									if(is_page()){
										if ( have_posts() ){
											while ( have_posts() ) : the_post();
												?>
													<div class="row">
														<div class="panel panel-info">
															<div class="panel-heading">
				    										<h3 class="panel-title"><?php echo substr(get_the_title(),0,100); ?></h3>
				  										</div>
				  										<div class="panel-body">
				    										<?php the_content(); ?>
				  										</div>
														</div>
													</div>
												<?php
											endwhile;
										}
									}else{
										if ( have_posts() ){
											while ( have_posts() ) : the_post();
												?>
													<div class="row">
															<div class="panel panel-success">
																<div class="panel-heading">
																	<h3 class="panel-title"><?php echo substr(get_the_title(),0,300); ?></h3>
																</div>
																<div class="panel-body panel-body-summary">
																	<?php echo the_excerpt(); ?>
																	<br />
																	<br />
																	<a href="<?php the_permalink(); ?>" class="btn btn-primary">Continue Reading</a>
																</div>
																<div class="panel-footer"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> | <?php the_category(', '); ?> | <?php comments_number('No comments', '1 comment', '% comments'); ?></div>
															</div>
													</div>
												<?php
											endwhile;
											?>
												<div class="row">
													<div class="btn-group btn-group-justified">
														<a href="<?php echo get_previous_posts_page_link();?>" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Newer Posts</a>
														<a href="<?php get_site_url();?>/?random=1" class="btn btn-default"><i class="fa fa-question" aria-hidden="true"></i> Surprise me!</a>
														<a href="<?php echo get_next_posts_page_link();?>" class="btn btn-default">Older Posts <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
													</div>
												</div>
											<?php
										}else{
											?>
												<h2>Woops...</h2>
												<p>Sorry, no posts we're found.</p>
											<?php
										}
									}
								?>
							</div>
		        </div>
						<div class="right col-md-3" id="sidebar">
							<div class="panel panel-primary">
	  						<div class="panel-heading">
	    						<h3 class="panel-title">Supah Sexy Sidebar</h3>
	  						</div>
								<div class="panel-body">
	    						<?php dynamic_sidebar( 'sidebar-1' ); ?>
	  						</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="blog-footer">
			 <div class="container">
				 <?php get_footer(); ?>
			 </div>
			</footer>
	</body>
</html>
