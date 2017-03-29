<?php
/**
 * Template Name: Contact
 */

get_header();
echo get_template_part( '/assets/template-parts/hero' );
?>
<section class="no-mobile-wrap">
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			the_content();
		} // end while
	} // end if
	?>
</section>
<section class="wrap">
	<div class="contact-info pt">
		<div class="col-xs-12 col-sm-6 contact-info-block">
			<h4 class="white uppercase text-center">BOLD CATERING</h4>
			<p class="white text-center"><?php the_field('catering_address'); ?></p>
			<p class="white text-center"><?php the_field('catering_phone_numer'); ?></p>
			<a target="_blank" href="<?php the_field('catering_directions'); ?>" class="white text-center didot underline">Directions</a>
		</div>
		<div class="col-xs-12 col-sm-6 contact-info-block">
			<h4 class="white uppercase text-center">BOLD DESIGN</h4>
			<p class="white text-center"><?php the_field('design_address'); ?></p>
			<p class="white text-center"><?php the_field('design_phone_numer'); ?></p>
			<a target="_blank" href="<?php the_field('design_directions'); ?>" class="white text-center didot underline">Directions</a>
		</div>
		<div class="clearfix"></div>
		<div class="media-contact-wrap pt pb">
			<h4 class="text-center uppercase blue-text">Media Contact</h4>
			<h5 class="text-center pt pb">Phase 3 Marketing and Communications</h5>
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div class="col-xs-12 col-md-4 pb">
					<p class="no-m"><?php the_field('name_1'); ?></p>
					<p class="no-m"><a href="mailto:<?php the_field('email_1'); ?>"><?php the_field('email_1'); ?></a></p>
				</div>
				<div class="col-xs-12 col-md-4 pb">
					<p class="no-m"><?php the_field('name_2'); ?></p>
					<p class="no-m"><a href="mailto:<?php the_field('email_2'); ?>"><?php the_field('email_2'); ?></a></p>
				</div>
				<div class="col-xs-12 col-md-4 pb">
					<p class="no-m"><?php the_field('phone'); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>