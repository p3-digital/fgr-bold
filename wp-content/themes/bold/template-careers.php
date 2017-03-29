<?php
/**
 * Template Name: Careers
 */

get_header();
echo get_template_part( '/assets/template-parts/hero' );
?>

<section class="wrap-small">
	<h4 class="text-center blue-text section-title"><?php the_field('pc_section_title'); ?></h4>
	<p class="text-center"><?php the_field('content'); ?></p>
</section>

<section class="no-mobile-wrap">
	<div class="red-bg content-callout pb pt wrap">
		<img class="center-star" src="<?php echo get_template_directory_uri(); ?>/assets/img/transparent-star.png" alt="Bold">
		<h3 class="text-center white didot wrap-small no-p"><?php the_field('highlight_box_content'); ?></h3>
	</div>
</section>

<section class="wrap-small">
	<h4 class="text-center blue-text section-title"><?php the_field('b_section_title'); ?></h4>
	<div class="col-xs-12 col-sm-6">
		<p><?php the_field('left_column'); ?></p>
	</div>
	<div class="col-xs-12 col-sm-6">
		<ul class="benefits">
			<?php
			if( have_rows('benefits') ):
			    while ( have_rows('benefits') ) : the_row();
			        $benefit = get_sub_field('benefit'); 
			?>
				<li class="red-text"><?php echo $benefit; ?></li>
			<?php 
				endwhile;
			endif;
			?>
			    	
		</ul>
	</div>
</section>

<section class="no-mobile-wrap">
	<div class="grey-bg pt pb mt mb pull-left">
		<div class="wrap-small no-p">
			<h5 class="blue-text didot text-center pl pr"><?php the_field('testimonial'); ?></h5>
		</div>
	</div>
</section>

<section class="wrap">
	<div class="center-btn"><a target="_blank" href="<?php the_field('current_openings_link'); ?>" class="main-btn-blue main-btn-xl">VIEW CURRENT OPENINGS</a></div>
</section>

<?php
echo get_template_part( '/assets/template-parts/social' );
?>
<div class="clearfix"></div>
<h3 class="red-text didot text-center wrap-small"><?php the_field('social_header'); ?></h3> 
<section class="wrap-small mt pt hidden-xs">
	<?php echo do_shortcode('[instagram-feed id="boldamericanevents"]'); ?>
</section>


<?php
get_footer();
?>