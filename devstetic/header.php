<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Devstetic_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/185901124c.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'devstetic' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container-fluid">
			<div class="row">
			<div class="site-branding col-lg-8">
			<img class="logotip" src="<?php the_field('logo_white', 'option'); ?>" />
			<img class="logotip-colored" src="<?php the_field('logo_color', 'option'); ?>" />

			</div><!-- .site-branding -->

			<nav class="primary-menu col-lg-4">
                <?php echo do_shortcode('[responsive_menu_pro]'); ?>

           </nav>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
