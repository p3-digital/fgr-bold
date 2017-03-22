<?php
/**
 * Template Name: Contact
 */

get_header();
?>
<div class="no-mobile-wrap">
	<div class="page-hero" style="background-image: url(<?php the_field('hero_image');?> );">
		<div class="hero-overlay">
			<h1 class="uppercase"><?php the_title(); ?></h1>
		</div>  	
	</div>
</div>
<section class="wrap">
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
	<div class="contact-info pt pb">
		<div class="col-xs-12 col-sm-6">
			<h3 class="white uppercase text-center">BOLD CATERING</h3>
		</div>
		<div class="col-xs-12 col-sm-6">
			<h3 class="white uppercase text-center">BOLD DESIGN</h3>
		</div>
	</div>
</section>
<?php get_footer(); ?>