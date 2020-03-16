<?php
/**
 * Template name: Portfolio
 * The template for displaying Portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Devstetic_Theme
 */

get_header('portfolio');
?>

	<div id="primary" class="content-area portfolio-content">
		<main id="main" class="site-main">		

		<?php
		while ( have_posts() ) :
			the_post(); ?>
			<div class="container">
				<h1><?php echo $post->post_title; ?></h1>
				<?php the_content(); ?>
				<div class="works">
					<?php 
						$workitems = get_field('work_items');
						foreach ($workitems as $item) { ?>
						<div class="workitem row">
							<div class="col-lg-4 title">							
								<img src="<?php echo get_the_post_thumbnail_url($item->ID); ?>" alt="<?php echo $item->post_title; ?>">
								<h2><?php echo $item->post_title; ?></h2>
							</div>

							<div class="col-lg-8 excerpt">
								<?php echo $item->post_excerpt; ?>
								<a class="portmore" id="more-<?php echo $item->id; ?>" href="#"><button class="btn">Show More</button></a>
								<a class="portless" id="close-<?php echo $item->id; ?>" href="#"><button class="btn">Show Less</button></a>
							</div>

							<div class="col-lg-12 content" id="content-<?php echo $item->id; ?>">
								<?php echo $item->post_content; ?>					
							</div>

							<script>
								jQuery("#more-<?php echo $item->id; ?>").click(function(e){	 
									e.preventDefault();	
								  	jQuery("#content-<?php echo $item->id; ?>").slideToggle();
								  	jQuery("#more-<?php echo $item->id; ?>").fadeOut();
								  	jQuery("#close-<?php echo $item->id; ?>").fadeIn();
								});

								jQuery("#close-<?php echo $item->id; ?>").click(function(e){
									e.preventDefault();		  	
								  	jQuery("#content-<?php echo $item->id; ?>").slideToggle();
								  	jQuery("#more-<?php echo $item->id; ?>").fadeIn();
								  	jQuery("#close-<?php echo $item->id; ?>").fadeOut();
								});
							</script>
						</div>
					<?php } ?>
				</div>			
			</div>	
				
		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
