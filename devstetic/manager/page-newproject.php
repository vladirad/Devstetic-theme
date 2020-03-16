<?php
/**
 * Template name: New Project - Dashboard Manager
 * The template for displaying Portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Devstetic_Theme
 */
acf_form_head();
get_header('manager');
?>
			
			<div class="col-9" id="right-side">
				<?php acf_form(array(
					'post_id'		=> 'new_post',
					'new_post'		=> array(
						'post_type'		=> 'projects',
						'post_status'		=> 'publish'
					),
					'submit_value'		=> 'Create a new Project'
				)); ?>
			</div>

<?php
acf_enqueue_uploader();
get_footer('manager');
