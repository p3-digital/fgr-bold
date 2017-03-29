<?php
/**
 * Template Name: Thank you
 * Template Post Type: post, page, product
 * Description: Page template for thanking you
 */

get_header();
echo get_template_part( '/assets/template-parts/hero' );
?>

<h2 class="red-text text-center didot"><?php the_title(); ?></h2>
<section class="wrap-small">
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			the_content();
		} // end while
	} // end if
	?>
</section>

<?php
echo get_template_part( '/assets/template-parts/social' );
?>


<section class="wrap-small fce-section text-center">
	<h4 class="text-center uppercase blue-text section-title">Featured CORPORATE EVENTS</h4>
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
				<div class="col-xs-12" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>);">
					<div class="overlay">
						<div class="related-cs-wrap">
							<h5 class="didot white text-center"><?php the_field('thumbnail_subtitle');?></h5>
							<?php
							// check if the repeater field has rows of data
							if( have_rows('sidebar_facts') ):
	 							// loop through the rows of data
	    							while ( have_rows('sidebar_facts') ) : the_row();

	        							// display a sub field value
									$val = get_sub_field('row_title');
	        							if( $val=='VENUE' ): 
										?>
							<h6 class="white uppercase text-center"><?php echo the_sub_field('row_fact'); ?></h6>
										<?php
									endif;
	    							endwhile;
							else :
	    							// no rows found
							endif;
							?>	
							<h5 class="didot white text-center"><?php the_field('venue',$post->ID); ?></h5>
						</div>
					</div>
				</div>
				<a href="<?php the_permalink(); ?>" class="hidden"><?php the_title(); ?></a>
			</div>
		<?php }
		wp_reset_postdata();
	}
	?>
	<div class="clearfix"></div>
	<div class="center-btn"><a href="/portfolio" class="main-btn-blue main-btn-big">VIEW FULL PORTFOLIO</a></div>
</section>


<?php





get_footer();
?>