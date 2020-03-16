<?php
/**
 * Template name: Homepage OLD
 * The template for displaying Homepage-old
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Devstetic_Theme
 */

get_header();
?>

	<div id="primary" class="content-area homepage-content">
		<main id="main" class="site-main">

		

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<section id="home">
				<div class="container-full h-100">
					
					<?php 
						$hero_button = get_field('hero_button');
					?>
					<div class="row h-100">
					
						<div class="col-12 col-lg-12 align-self-center">
						<h1 class="big-white"><?php the_field('hero_title'); ?></h1>
						<div class="container">
						<div class="box">
							<h2><?php the_field('hero_title'); ?></h2>
							<span><?php the_field('hero_text'); ?></span>
							<a href="<?php echo $hero_button['link']; ?>"><button id="main-btn"><?php echo $hero_button['label']; ?></button></a>
						</div>
						</div>
						</div>
					</div>
					<div class="col-12 col-lg-12 scroll-down text-center"><img class="img-responsive" src="<?php bloginfo('template_url'); ?>/img/scroll_down.png" >
				</div>
			</section>

			<section id="services">
				<div class="container">
							<h2 class="section-title"><?php the_field('services_title'); ?></h2>
				</div>
				
							<?php
                             $counter = 1;
							// check if the repeater field has rows of data
							if( have_rows('services') ):
							 	// loop through the rows of data
							    while ( have_rows('services') ) : the_row(); 
								$counter++;
							    	$service = get_sub_field('service');
							    ?>
                              <?php if ($counter % 2 == 0): ?>
								<div class="service row align-items-center">
								
									<div class="image col-lg-6">
										<?php echo get_the_post_thumbnail($service); ?>
									</div>
                                 
									<div class="description col-lg-6">
										<a href="<?php echo get_the_permalink($service); ?>"><h3 class="service-title"><?php echo get_field('service_title', $service); ?></h3></a>
										<p class="service-excerpt"><?php echo get_the_excerpt($service); ?></p>
										<a class="read-more" href="<?php echo get_the_permalink($service); ?>">Read More</a>
									</div>
								</div>
								<?php else: ?>
								<div class="service-2 row align-items-center">
								
								    <div class="description col-lg-6">
										<a href="<?php echo get_the_permalink($service); ?>"><h3 class="service-title"><?php echo get_field('service_title', $service); ?></h3></a>
										<p class="service-excerpt"><?php echo get_the_excerpt($service); ?></p>
										<a class="read-more" href="<?php echo get_the_permalink($service); ?>">Read More</a>
									</div>
								
									<div class="image col-lg-6">
										<?php echo get_the_post_thumbnail($service,'full',array( 'class'  => 'float-right' )); ?>
									</div>
                                 
								</div>
								
								<?php endif ?>
                               

							<?php    endwhile;

							else :

							    // no rows found

							endif;

							?>	
				
			</section>

			<section id="team">
				<div class="container">
				<h2 class="section-title"><?php the_field('team_title'); ?></h2>
						<div class="row">
							<?php

							// check if the repeater field has rows of data
							if( have_rows('team_members') ):

							 	// loop through the rows of data
							    while ( have_rows('team_members') ) : the_row(); 
							    	$member = get_sub_field('member');
							    	$socials = get_field('socials', $member);
							    ?>
								
								<div class="team-member col-lg-4">
									<div class="avatar">
										<?php echo get_the_post_thumbnail($member); ?>
										<div class="socials">
											<?php if( have_rows('contact_social') ):

									 			// loop through the rows of data
									    		while ( have_rows('contact_social') ) : the_row(); ?>

													<a href="<?php the_sub_field('link'); ?>" target="blank" title="<?php the_sub_field('title'); ?>"><i class="<?php the_sub_field('icon'); ?>"></i></a>

											<?php endwhile;
					
											else :
					
											    // no rows found
					
											endif;
						
											?>	
										</div>
									</div>

									<div class="description">
										<h3 class="member-name text-center"><?php echo $member->post_title; ?></h3>
										<h4 class="member-position text-center"><?php the_field('position', $member); ?></h3>
									</div>
								</div>

							<?php    endwhile;

							else :

							    // no rows found

							endif;

							?>
						</div>
					</div>	
			</section>

			<?php $static = get_field('static_block'); ?>
			
			<section id="static" style="background-image: url('<?php echo $static['image']; ?>');"><div class="overlay">
				<div class="container">
					<div class="row">									
					<div class="static_title col-6"><?php echo $static['text']; ?></div>
					<div class="static_link col-6"><a href="<?php echo $static['button_link']; ?>"><button><?php echo $static['button_label']; ?></button></a></div>
					</div>
				</div>
			</div></section>
			
			
			<section id="works">
				<div class="container">
					<div class="title-filter row">
						<div class="left col-6"><h2 class="section-title"><?php the_field('works_title'); ?></h2></div>
						<div class="right col-6">
							<ul>
								<li><a href="#all">All</a></li>
								<?php 
									$workcats = get_terms('work_cat');

									foreach($workcats as $workcat) { ?>
										<li><a href="#<?php echo $workcat->slug; ?>"><?php echo $workcat->name; ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>

					<div class="work-items row">
					
						<?php

						// check if the repeater field has rows of data
						if( have_rows('works') ):

						 	// loop through the rows of data
						    while ( have_rows('works') ) : the_row(); 
						    	$item = get_sub_field('item');
						    ?>

							<div class="work-item col-lg-4">
								<a href="<?php echo get_the_permalink($item); ?>">
								<div class="image">
									<?php 
										echo get_the_post_thumbnail($item); 
										$workcat = get_the_terms($item, 'work_cat'); 
									?>
									<h4 class="work-item-category"><?php echo $workcat[0]->name;?></h4>	
								</div>
								</a>
							</div>

						<?php    endwhile;

						else :

						    // no rows found

						endif;

						?>
					</div>
				</div>	
			</section>

			<section id="contact">
				<div class="container">
					<div class="row align-items-center">
					<?php
						// check if the repeater field has rows of data
						if( have_rows('contact') ):

						 	// loop through the rows of data
						    while ( have_rows('contact') ) : the_row(); 
						    ?>
						<div class="contact-info col-lg-6">
							
							<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
							<p><?php the_sub_field('text'); ?></p>
							<div class="info">
							<?php
							// check if the repeater field has rows of data
							if( have_rows('info') ):

							 	// loop through the rows of data
							    while ( have_rows('info') ) : the_row(); 
							    	
							    ?>
									
								<i title="<?php the_sub_field('name'); ?>" class="<?php the_sub_field('icon'); ?> service"></i><h5 class="name"><?php the_sub_field('value'); ?></h5>

								<?php endwhile;

							else :

						    // no rows found

							endif;

							?>
							</div>
						</div>
						<div class="contact-form col-lg-6">
							<h4 class="text-center form-title"><?php the_sub_field('form_title'); ?></h5></h4>
							<?php 
							$shortcode = get_sub_field('form_shortcode');
							echo do_shortcode($shortcode); ?>
						</div>
					<?php    endwhile;

					else :

					    // no rows found

					endif;

					?>
					</div>
				</div>
				
			</section>
		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
