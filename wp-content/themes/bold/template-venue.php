<?php
/**
 * Template Name: Venue
 */

get_header();
?>

<div class="no-mobile-wrap">
	<div class="inner-hero inner-hero-big" style="background-image: url(<?php the_field('hero_image');?> );">
		<div class="hero-overlay">
			<h1 class="uppercase text-center white"><?php the_title(); ?></h1>
			<h3 class="white didot text-center"><?php the_field('hero_subtitle'); ?></h3>  	
		</div>
	</div>
</div>


<section class="wrap-small">
	<div class="col-xs-12 col-sm-4">
		<img class="venue-logo" src="<?php the_field('venue_logo'); ?>" alt="<?php the_title(); ?>">
	</div>
	<div class="col-xs-12 col-sm-8 pull-right">
		<?php the_field('content'); ?>
	</div>
</section>


<section class="wrap threedview">
	<iframe src="<?php the_field('3d_view'); ?>" frameborder="0"></iframe>
</section>


<section class="wrap-small">
	<h4 class="text-center blue-text uppercase section-title">Features</h4>
	<div class="col-xs-12 col-sm-6"><p><?php the_field('left_column_text'); ?></p></div>
	<div class="col-xs-12 col-sm-6"><p><?php the_field('right_column_text'); ?></p></div>
	<div class="clearfix"></div>
	<div class="center-btn"><a href="/contact" class="main-btn-blue main-btn-xxl mt"><?php the_field('book_button_text'); ?></a></div>
</section>


<section class="wrap">
	<div class="grey-bg section">
		<h4 class="text-center red-text section-title uppercase">Premium Partners</h4>
		<p class="text-center mb"><?php the_field('premium_partners_text'); ?></p>
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<div class="center-btn"><a href="/premium-partners" class="main-btn-red main-btn-xl">VIEW ALL ATLANTA VENUES</a></div>
		</div>
	</div>
</section>


<?php
get_footer();
?>