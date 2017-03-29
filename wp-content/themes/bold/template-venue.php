<?php
/**
 * Template Name: Venue
 */

get_header();
?>

<div class="no-mobile-wrap hero-offset hero">
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
	<div class="cols">
		<div class="col-xs-12"><?php the_field('left_column_text'); ?></div>
	</div>
</section>
<div class="clearfix"></div>
<section class="section no-pb">
	<div class="center-btn"><a href="/contact" class="main-btn-blue main-btn-xxl no-mt"><?php the_field('book_button_text'); ?></a></div>
</section>

<section class="section no-mobile-wrap">
	<div class="grey-bg pb">
		<h4 class="text-center red-text section-title uppercase wrap-small">Premium Partners</h4>
		<div class="wrap-small no-pt">
			<p class="text-center"><?php the_field('premium_partners_text'); ?></p>
		</div>
		<div class="center-btn"><a href="/premium-partners" class="main-btn-red main-btn-xl">VIEW ALL ATLANTA VENUES</a></div>
	</div>
</section>


<?php
get_footer();
?>