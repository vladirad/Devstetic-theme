<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Devstetic_Theme
 *
 *
 */

if (!is_user_logged_in() || !current_user_can('administrator')) {
	wp_redirect( home_url() );
	exit;
}

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
	
	<div class="row manager">
		<div class="col-3" id="left-side">

				<span>Projects and settings</span>
               <div class="list-block">
               	<?php
               		$projargs = array(
               			'post_type' => 'projects',
               			'posts_per_page' => '-1'
               		);

               		$projects = get_posts($projargs);
               	?>
				<ul>
					<?php foreach ($projects as $project) : ?>
					<li>
						<a href="/manager-dashboard/edit-project?projectid=<?php echo $project->ID; ?>">
							<?php echo $project->post_title; ?>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>

				<a href="/manager-dashboard/new-project"><button class="btn">Add New Project</button></a>
			</div>
			</div>

