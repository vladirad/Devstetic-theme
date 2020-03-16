<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Devstetic_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 footerlogo"><img src="<?php echo get_field('footer_logo', 'option'); ?>" alt="Devstetic"></div>
				<div class="col-lg-4 copyright"><?php echo get_field('footer_copyright', 'option'); ?></div>
				<div class="col-lg-4 socials">
					<?php

					// check if the repeater field has rows of data
					if( have_rows('socials', 'option') ):

					 	// loop through the rows of data
					    while ( have_rows('socials', 'option') ) : the_row();
					    	echo '<a href="'.get_sub_field('link').'">'.get_sub_field('title').'</a>';
					        // display a sub field value
					        
					    endwhile;

					else: 
						//no rows
					endif;

					?>
				</div>
			</div>
		</div>
		<div class="site-info">
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
