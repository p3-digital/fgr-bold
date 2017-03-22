<?php
/**
 * Template Name: Thank you
 * Template Post Type: post, page, product
 * Description: Page template for thanking you
 */

get_header();
?>
<div class="no-mobile-wrap">
	<div class="page-hero" style="background-image: url(<?php the_field('hero_image');?> );">
		<div class="hero-overlay">
			<h1 class="uppercase">Contact Us</h1>  	
		</div>
	</div>
</div>
<h2 class="red-text text-center didot mt mb"><?php the_title(); ?></h2>
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

<section class="mt social">
	<?php
	//socials
	if( have_rows('social_icons', 'option') ):
	    while ( have_rows('social_icons', 'option') ) : the_row();
	        $icon = get_sub_field('icon', 'option'); 
	        $link = get_sub_field('link', 'option'); 
	?>
	<a target="_blank" class="social-link" href="<?php echo $link; ?>"><img src="<?php echo esc_url($icon); ?>" alt="Social"></a>
	<?php 
		endwhile;
	else :
	    // no rows
	endif;
	?>
	<div class="clearfix"></div>
</section>


<section class="wrap fce-section">
	<h4 class="text-center uppercase blue-text section-title">Featured Catered Events</h4>
	<?php
	$args = array(
		'post_type' => 'case_study',
		'posts_per_page' => 3,
		);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();?>
			<div class="col-xs-12 col-sm-4 related-cs">
				<div class="col-xs-12" style="background-image: url(<?php the_field('hero_image', $post->ID); ?>);">
					<div class="overlay">
						<h5 class="didot white text-center"><?php the_title(); ?></h5>
						<h6 class="white uppercase text-center">Venue</h6>	
						<h5 class="didot white text-center"><?php the_field('venue',$post->ID); ?></h5>
					</div>
				</div>
				<a href="<?php the_permalink(); ?>" class="hidden"><?php the_title(); ?></a>
			</div>
		<?php }
		wp_reset_postdata();
	}
	?>
	<div class="clearfix"></div>
	<a href="/portfolio" class="main-btn-blue main-btn-big">VIEW FULL PORTFOLIO</a>
</section>


<?php





get_footer();
?>