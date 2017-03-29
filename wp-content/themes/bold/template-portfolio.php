<?php
/**
 * Template Name: Portfolio
 */

get_header();
echo get_template_part( '/assets/template-parts/hero' );
?>

<section class="filter-wrap col-xs-12 col-md-10 col-md-offset-1 hidden-xs">
	<p class="filter-label red-text uppercase">Filter By: </p>
	<a class="red-text uppercase" data-id="all">All</a>
	<?php
	$terms = get_terms( array(
	    'taxonomy' => 'cs_category',
	    'hide_empty' => false,
	) );
	foreach ($terms as $t) {
		echo '<a class="red-text uppercase" data-id="'.$t->slug.'">'.$t->name.'</a>';
	}
	?>
</section>
<section class="wrap hidden-sm hidden-md hidden-lg mt">
	<select id="csFilter">
		<option value="all">All</option>
		<?php
		foreach ($terms as $t) {
			echo '<option class="red-text uppercase" value="'.$t->slug.'">'.$t->name.'</option>';
		}
		?>
	</select>
</section>


<section class="wrap-xs fce-section">
	<?php
	$args = array(
		'post_type' => 'case_study',
		'posts_per_page' => -1,
		'order' => 'ASC',
	    'orderby' => 'menu_order'
		);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();?>
			<?php
			$terms = get_the_terms($post->ID, 'cs_category');
			$class = '';
			foreach ($terms as $t) {
				$class .= $t->slug.' ';
			}
			?>
			    	
			<div class="col-xs-12 col-sm-4 related-cs <?php echo $class; ?>">
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
</section>


<?php
get_footer();
?>