<?php
/**
 * Template name: Homepage
 * The template for displaying Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Devstetic_Theme
 */

get_header();
?>


<!-- This following line is optional. Only necessary if you use the option css3:false and you want to use other easing effects rather than "easeInOutCubic". -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.5/vendors/easings.min.js"></script>


<!-- This following line is only necessary in the case of using the option `scrollOverflow:true` -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.5/vendors/scrolloverflow.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.5/fullpage.min.js"></script>
<script>

jQuery(document).ready(function( $ ) {
	$('#fullpage').fullpage({
	    anchors: ['intro', 'services', 'clients', 'team', 'works', 'contact'],
		lazyLoading: true,
        menu: true,
        slidesNavigation: true,
        slidesNavPosition: 'bottom',
        controlArrows: false,
        scrollingSpeed: 300,
		licenseKey : '3D578BFF-FCD34A2B-8B831A25-7B60ACFA',
		/*afterLoad: function () {
			var section = fullpage_api.getActiveSection();
			var sectionanchor = section.anchor;
			console.log('section: ' + sectionanchor);
            setInterval(function () {
                $.fn.fullpage.moveSlideRight();
            }, 10000);

            if (sectionanchor == 'services' || sectionanchor == 'works') {
            	$('.responsive-menu-pro-box').addClass("whitemenu");
            } else {
            	$('.responsive-menu-pro-box').removeClass("whitemenu");
            }
        },*/
});	
var typed = new Typed('.typed-span', {
    strings: ['family', 'team', 'funny', 'friends', 'brilliant', 'devstetic'],
    loop: true,
    typeSpeed: 40
  });



});
</script>

<?php

$intro = get_field('intro');
$clients = get_field('clients');
$contact = get_field('contact');

?>

<div id="fullpage">

	<div class="section" id="idintro">
	    <div class="row h-100">
	       <div class="col-12 col-md-6 colored">
		      <div class="h-100 d-flex justify-content-center flex-column">
		       	<h2><?php echo $intro['text_left']; ?></h2>
		      </div>
           </div>

           <div class="col-12 col-md-6 white" id="sentence">
		   <div class="h-100 d-flex justify-content-center flex-column">
		       
		       <h3><?php echo $intro['text_right']; ?></h3>
		      </div>
           </div>
		</div>
	</div>

	<?php if( have_rows('services') ): while ( have_rows('services') ) : the_row(); ?>
	<div class="section" id="idservices">
	    <div class="row h-100">
	       	<div class="col-12 col-md-6 white d-none d-md-block">
	       		<div class="h-100 d-flex justify-content-center flex-column">
		   		<h2><?php the_sub_field('text_left'); ?></h2>

		   	</div>
           	</div>
			
           	<div class="col-12 col-md-6  d-flex justify-content-center flex-column colored">
           		<div class="slides">
           		<?php if( have_rows('slides') ): while ( have_rows('slides') ) : the_row(); ?>
           		
					<div class="slide">
						<div class="reliable">
							<h2 class="wedev">WE develop</h2>
						<?php the_sub_field('title'); ?>
						<?php the_sub_field('content'); ?>
					</div>
					</div>				
				
				<?php endwhile; endif; ?>
				</div>
           	</div>
		</div>
	</div>
	<?php endwhile; endif; ?>

	<div class="section" id="idclients">
	    <div class="row h-100">
	       <div class="col-12 col-md-6 colored">
		      <div class="h-100 d-flex justify-content-center flex-column" style="background-image:url(<?php echo $clients['background_left']; ?>);">
		       	<h2><?php echo $clients['text_left']; ?></h2>
		      </div>
           </div>

           <div class="col-12 col-md-6 white">
		   <div class="h-100 d-flex justify-content-center flex-column">
		       
		       <h3><?php echo $clients['text_right']; ?></h3>
		      </div>
           </div>
		</div>
	</div>
	
	<?php if( have_rows('team') ): while ( have_rows('team') ) : the_row(); ?>
		<?php $counter; $counter2; ?>
	<div class="section" id="idteam">
		<div class="container">

			<?php if( have_rows('members') ): while ( have_rows('members') ) : the_row(); ?>
				<?php $team_member_image = get_sub_field( 'picture' ); ?>
	            <?php $team_member_hover_image = get_sub_field( 'picture_2' ); ?>
	            <?php $team_member_visited_image = get_sub_field( 'picture_3' ); ?>
	            <?php $counter2++; ?>
				 <style type="text/css">
	                    .blockNumber-<?php echo $counter2; ?>{
	                        background-image: url('<?php echo $team_member_image; ?>');
	                        transition: .5s;
	                        background-size: contain;
                            background-repeat: no-repeat;
                            display: block;
	                    }
	                    .blockNumber-<?php echo $counter2; ?>:hover{
	                        background-image: url('<?php echo $team_member_hover_image; ?>');
	                        transition: .5s;
	                        background-size: contain;
                            background-repeat: no-repeat;
                            display: block;
	                    }
	                    .blockNumber-<?php echo $counter2; ?>:focus{
	                        background-image: url('<?php echo $team_member_visited_image; ?>');
	                        transition: .5s;
	                        background-size: contain;
                            background-repeat: no-repeat;
                            display: block;
	                    }
	                </style>
			<?php endwhile; endif; ?>
		<div class="row  team-slider">
			<?php if( have_rows('members') ): while ( have_rows('members') ) : the_row(); ?>
	            <?php $counter++; ?>
	               
			<div class="col-12 col-sm-6 col-md-4">
				<div class="team-box ">
					<a class="op blockNumber-<?php echo $counter; ?>"><img src="https://devstetic.com/wp-content/uploads/2019/09/base.png"/></a>
					<h4 class="team-name"><?php the_sub_field('name'); ?></h4>
					<h5 class="team-position"><?php the_sub_field('position'); ?></h5>	
				</div>
			</div>
			<?php endwhile; endif; ?>
		</div>	
		<div class="teamslider">
			<img src="<?php bloginfo('template_url'); ?>/img/we.svg" class="we-team" />
			<div class="teamslides">
				
				<div class="teamslide" >					
				<span><b>are</b></span><span class="typed-span"></span>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php endwhile; endif; ?>
	
	  
	<div class="section" id="idworks">
	    <div class="row h-100">
	       <div class="col-12 colored">
				<div class="workslides">
					<?php if( have_rows('works') ): while ( have_rows('works') ) : the_row(); ?>
					<div class="slide">
						<div class="d-flex justify-content-center flex-column">
						<div class="centriraj">
						<h4><?php the_sub_field('overtitle'); ?></h4>
						<h2><?php the_sub_field('name'); ?></h2>
						<a href="<?php the_sub_field('more_link'); ?>" class="more"><?php the_sub_field('more_text'); ?></a>
					</div>
					</div>
					</div>
					<?php endwhile; endif; ?>
				</div>
           </div>
		</div>
	</div>
	
	<div class="section" id="idcontact">
	    <div class="row h-100">

	       <div class="col-12 d-flex justify-content-center flex-column kontakt">
	       	<div class="container">
				<?php echo $contact['content']; ?>
</div>
				<div class="kontakt-get">
			<img src="<?php bloginfo('template_url'); ?>/img/get.svg" class="we-team" />
			<div class="kontaktoverlay">
				
				<div class="kontaktinner" id="getkontakt" >					
				<span class="in">in</span><b>touch</b></span>
				</div>
			</div>
		</div>
							
           </div>
		</div>
	</div>

</div>



<?php

get_footer();
