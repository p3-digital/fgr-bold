<?php
/**
 * Template Name: Corporate Events
 */

get_header();
echo get_template_part( '/assets/template-parts/hero' );
echo get_template_part( '/assets/template-parts/two-col' );
?>

<section class="wrap-small">
	<div class="clearfix"></div>
	<div class="mt">
	<?php
	if( have_rows('company_logos') ):
	    while ( have_rows('company_logos') ) : the_row();
	        $logo = get_sub_field('logo'); 
	?>
		<div class="col-xs-12 col-sm-3"><img src="<?php echo $logo; ?>" alt="Image"></div>
	<?php 
		endwhile;
	endif;
	?>
	</div>
</section>
<section class="catering grey-bg">
	<div class="grey-bg pt">
		<h4 class="text-center ce-title blue-text section-title">CORPORATE EVENT SERVICES</h4>
		<!-- tabs -->
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 hidden-xs hidden-sm">
			<ul class="nav nav-tabs" role="tablist">
				<?php
				$ce = get_field('service');
				if($ce){
					$i = 0;
					foreach($ce as $row){
						if($i == 0){
							$class = 'active';
						}else{
							$class = '';
						}
						 echo '<li role="presentation" class="col-xs-12 col-sm-4 ce-tab '.$class.'""><h5><a class="red-text didot" href="#index-'.$i.'" role="tab" data-toggle="tab">'.$row['name'].'</a></h5></li>';
						 $i++;
					}
				}
				?>
			</ul>
		</div>
	</div>
	<div class="tab-content ce-content masonry-wrap grey-bg">
		<?php
		if( have_rows('service') ):
			$i = 0;
		    while ( have_rows('service') ) : the_row();
		        $description = get_sub_field('description'); 
		        $title = get_sub_field('name'); 
		        if ($i == 0) {
		        	$class = 'active';
		        }else{
		        	$class = '';
		        }
		?>	
			<div role="tabpanel" class="tab-pane catering-experience-tab" id="index-<?php echo $i; ?>">
				<h3 class="mobile-ce-section-toggle text-center hidden-md hidden-lg"><a class="red-text" href="" class=""><?php echo $title; ?></a></h3>
				<div class="section"><div class="col-xs-12"><?php echo $description; ?></div></div> 
				<div class="clearfix"></div>
				<div class="grid">
					<?php
					if( have_rows('image_gallery') ):
					    while ( have_rows('image_gallery') ) : the_row();
					        $size = get_sub_field('image_size'); 
					        $img = get_sub_field('image');
					        if ($size !== 'narrow') {
					        	$class = 'grid-item-lg';
					        }else{
					        	$class = '';
					        }
					?>
						<div class="grid-item <?php echo $size; ?>"><img src="<?php echo $img; ?>" alt="Image"></div>
					<?php 
						endwhile;
					endif;
					$i++;
					?>
				</div>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>	
</section>

<div class="clearfix"></div>
<section class="wrap-small fce-section text-center">
	<h4 class="text-center uppercase blue-text section-title">Featured CORPORATE EVENTS</h4>
	<?php
	$args = array(
		'post_type' => 'case_study',
		'posts_per_page' => 3,
		'post__not_in' => array($post->ID),
		'tax_query' => array(
				array(
					'taxonomy' => 'cs_category',
					'field'    => 'slug',
					'terms'    => 'corporate-events',
				),
			),
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