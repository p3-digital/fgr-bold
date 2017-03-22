<?php
/**
 * Template Name: Weddings
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

<section class="wrap-small">
	<h4 class="text-center blue-text uppercase section-title"><?php the_field('tc_section_title'); ?></h4>
	<div class="col-xs-12 col-sm-6"><p><?php the_field('left_column_text'); ?></p></div>
	<div class="col-xs-12 col-sm-6"><p><?php the_field('right_column_text'); ?></p></div>
</section>


<section class="wrap mt no-pad">
	<div class="section pink-bg">
		<div class="wrap-small no-pad">
			<h5 class="blue-text didot text-center"><?php echo the_field('testimonial'); ?></h3>
		</div>
	</div>
</section>

<section class="catering grey-bg">
	<div class="pt">
		<h4 class="text-center ce-title blue-text section-title">WEDDING SERVICES</h4>
		<!-- tabs -->
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 hidden-xs">
			<ul class="nav nav-tabs" role="tablist">
				<?php
				$service = get_field('service');
				if($service){
					$i = 0;
					foreach($service as $row){
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
	<div class="tab-content ce-content masonry-wrap">
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
			<div role="tabpanel" class="tab-pane catering-experience-tab <?php echo $class; ?>" id="index-<?php echo $i; ?>">
				<h3 class="mobile-ce-section-toggle text-center hidden-sm hidden-md hidden-lg"><a class="red-text" href="" class=""><?php echo $title; ?></a></h3>
				<div class="section"><?php echo $description; ?></div>
				<div class="clearfix"></div>
				<div class="grid">
					<?php
					if( have_rows('image_gallery') ):
					    while ( have_rows('image_gallery') ) : the_row();
					        $size = get_sub_field('image_size'); 
					        $img = get_sub_field('image');
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

<!--<section class="wrap mt">
	<div class="section pink-bg">
		<h3 class="uppercase text-center"><?php the_field('section_title'); ?></h3>
		<?php
		if( have_rows('featured') ):
		    while ( have_rows('featured') ) : the_row();
		        $img = get_sub_field('logo'); 
		        $page_type = get_sub_field('link_type');
		        if ($page_type == 'page') {
		        	$url = get_sub_field('page');
		        	$target = '';
		        }else{
		        	$url = get_sub_field('custom_url');
		        	$target = 'target="_blank"';
		        }
			?>
			<div class="col-xs-12 col-sm-3 pink-featured-image">
				<a <?php echo $target; ?> href="<?php echo $url; ?>"><img src="<?php echo $img; ?>" alt="Featured"></a>
			</div>
		<?php 
			endwhile;
		else :
		    // no rows found
		endif;
		?>  	
	</div>
</section>-->
<div class="wrap">
	<div class="section grey-bg">
		<h4 class="uppercase text-center"><?php the_field('section_title'); ?></h4>
		<?php
		if( have_rows('featured') ):
		    while ( have_rows('featured') ) : the_row();
		        $img = get_sub_field('logo'); 
		        $page_type = get_sub_field('link_type');
		        if ($page_type == 'page') {
		        	$url = get_sub_field('page');
		        	$target = '';
		        }else{
		        	$url = get_sub_field('custom_url');
		        	$target = 'target="_blank"';
		        }
			?>
			<div class="col-xs-12 col-sm-3 featured-image">
				<a <?php echo $target; ?> href="<?php echo $url; ?>"><img src="<?php echo $img; ?>" alt="Featured"></a>
			</div>
		<?php 
			endwhile;
		else :
		    // no rows found
		endif;
		?>  	
	</div>
</div>
<div class="clearfix"></div>
<section class="wrap-small fce-section mt text-center">
	<h4 class="text-center uppercase blue-text section-title">Featured Weddings + Occasions</h4>
	<?php
	$args = array(
		'post_type' => 'case_study',
		'posts_per_page' => 3,
		'post__not_in' => array($post->ID),
		'tax_query' => array(
				array(
					'taxonomy' => 'cs_category',
					'field'    => 'slug',
					'terms'    => 'wedding',
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



xxxxx