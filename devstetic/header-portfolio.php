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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'devstetic' ); ?></a>

	<header id="masthead" class="site-header porthead">
		<div class="container">
			<div class="row">
			<div class="site-branding col-lg-4">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				//$devstetic_description = get_bloginfo( 'description', 'display' );
				if ( $devstetic_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $devstetic_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav class="navbar navbar-expand-xl col-lg-8">

               <?php
               wp_nav_menu(array(
               'theme_location'    => 'menu-1',
               'container'       => 'div',
               'container_id'    => 'main-nav',
               'container_class' => 'collapse navbar-collapse justify-content-end',
               'menu_id'         => false,
               'menu_class'      => 'navbar-nav',
               'depth'           => 3,
               ));
               ?>

           </nav>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
