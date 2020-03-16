<?php
/**
 * Template name: Edit Project - Dashboard Manager
 * The template for displaying Portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Devstetic_Theme
 */
acf_form_head();
get_header('manager');
?>
	<?php 
		$projectid = (int) $_GET['projectid'];
	?>
	<div class="col-9" id="right-side">
		<?php acf_form(array(
			'post_id'	=> $projectid,
 			'post_title'	=> false,
			'submit_value'	=> 'Save Project',
			'kses'	=> false
		)); ?>
	</div>

<?php

get_footer('manager');
