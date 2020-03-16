<?php
/**
 * The template for displaying all work items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Devstetic_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container-fluid">
		<?php while ( have_posts() ) :
			the_post(); 

			$categories = get_the_terms($post, 'work_cat');
			$catlink = get_term_link($cat, 'work-cat');

			//var_dump($categories);
	
			/*$is_hidden = get_field('hidden_item');

			if($is_hidden == 'yes') {
				echo '<h1>Post not found.</h1>';
				echo '<a class="gohome" href="/">Go back to homepage.</a>';
			} else {
				echo '<h1>Portfolio content goes here</h1>';
			}*/
		?>
			<div class="row row-eq-height single-works-item">

				<?php if(!wp_is_mobile()) { ?>
					<div class="col-lg-6 col-12 works-left desktop-left">
						<?php the_content(); ?>
					</div>
				<?php } ?>
				

				<div class="col-lg-6 col-12 works-right <?php if(wp_is_mobile()) { echo 'mobile-right'; } ?>">
						<div class="project-info">
						<?php the_title('<h1>', '</h1>'); ?>
						
						<a class="client" href="<?php the_field('client_link'); ?>"><h4><?php the_field('client'); ?></h4></a>
						<h5 class="project-date"><?php the_field('project_date'); ?></h5>
						
						<div class="categories">
							<?php foreach ($categories as $cat): ?>
								<a><h5><?php echo $cat->name; ?></h5></a>
							<?php endforeach ?>
						</div>
						
						<?php 
							$projecttext = get_field('project_url_text');
							if ($projecttext == "" || is_null($projecttext)) { } else { ?>
							<a class="project-url" href="<?php the_field('project_url'); ?>"><?php the_field('project_url_text'); ?> <i class="fas fa-chevron-right"></i></a>
						<?php } ?>
						<span class="more">slide up for more <i class="fas fa-chevron-up"></i></span>				
					</div>
					
				</div>


				<?php if(wp_is_mobile()) { ?>
					<div class="col-lg-6 col-12 works-left mobile-left">
						<?php the_content(); ?>
					</div>
				<?php } ?>
			</div>			

		<?php endwhile; // End of the loop. ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
