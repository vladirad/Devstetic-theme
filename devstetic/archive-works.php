<?php
/**
 * The template for displaying works archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Devstetic_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container-fluid">
				<div class="row row-eq-height single-works-item">
					<div class="col-lg-6 col-12 works-left">
						<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>						
						
						<div class="work-item-archive">
							<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('works-archive'); ?>
							<?php the_title('<h2>', '</h2>'); ?>
							</a>
						</div>			

						<?php endwhile; ?>
						<?php  endif; ?>	
					</div>

					<div class="col-lg-6 col-12 works-right">
						<h1>Our Works</h1>
					</div>
				</div>			
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
