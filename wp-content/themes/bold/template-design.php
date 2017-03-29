<?php
/**
 * Template Name: Design
 */

get_header();

echo get_template_part( '/assets/template-parts/hero' );
echo get_template_part( '/assets/template-parts/two-col' );
?>
<section class="no-mobile-wrap">
	<div class="inner-hero" style="background-image: url(<?php the_field('full_width_image');?> );">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1"><h2 class="text-center white didot"><?php the_field('image_overlay_text'); ?></h2></div>
	</div>
</section>

<section class="catering">
	<div class="grey-bg pt">
		<h4 class="text-center ce-title blue-text section-title">DESIGN SERVICES</h4>
		<!-- tabs -->
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 hidden-xs hidden-sm ">
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
						 echo '<li role="presentation" class="col-xs-12 col-sm-4 ce-tab '.$class.'""><h5><a class="red-text didot" href="#index-'.$i.'" role="tab" data-toggle="tab">'.$row['service_title'].'</a></h5></li>';
						 $i++;
					}
				}
				?>
			</ul>
		</div>
	</div>
	<div class="tab-content ce-content">
		<!-- tabs content -->
		<?php
		if( have_rows('service') ):
			$n = 0;
		    while ( have_rows('service') ) : the_row();
		        $title = get_sub_field('service_title');
		        $description = get_sub_field('content'); 
		        if($n == 0){
					$active = 'active';
				}else{
					$active = '';
				}
		?>
			<div role="tabpanel" class="tab-pane catering-experience-tab experience-<?php echo $n; ?> " id="index-<?php echo $n; ?>">
				<h3 class="mobile-ce-section-toggle text-center hidden-md hidden-lg"><a class="red-text" href="" class=""><?php echo $title; ?></a></h3>
				<div class="ce-description">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<p><?php echo $description; ?></p>
					</div>
				</div>
				<img class="design-img" src="<?php echo get_sub_field('image'); ?>" alt="Image">
		    </div>
		<?php 
			$n++;
			endwhile;
		endif;
		?>
	</div>
	    	
</section>

<section class="wrap-small fce-section text-center">
	<h4 class="text-center uppercase blue-text section-title">Featured Event Designs</h4>
	<?php
	$args = array(
		'post_type' => 'case_study',
		'posts_per_page' => 3,
		'post__not_in' => array($post->ID),
		'tax_query' => array(
				array(
					'taxonomy' => 'cs_category',
					'field'    => 'slug',
					'terms'    =>  array( 'wedding', 'other-occasions', 'corporate-events' ),
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


<section class="section">
	<div class="grey-bg no-mobile-wrap pb">
		<h4 class="text-center red-text section-title wrap-small no-pt"><?php the_field('cta_section_title'); ?></h4>
		<div class="wrap-small no-pt">
			<p class="text-center"><?php the_field('content'); ?></p>
		</div>
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<?php
			if( have_rows('call_to_actions') ):
			?>
				<div class="center-btn center-multiple">
			<?php
			    while ( have_rows('call_to_actions') ) : the_row();
			        $label = get_sub_field('button_text'); 
			        if ( get_sub_field('button_type') == 'page') {
			        	$page = get_sub_field('page'); 
			        }else{
			        	$page = get_sub_field('custom_url');
			        }
			?>
				<a href="<?php echo $page; ?>" class="main-btn-red"><?php echo $label; ?></a>

			<?php 
				endwhile;
			?>
				</div>
			<?php 
			endif;
			?>	
		</div>
	</div>
</section>


<?php
get_footer();
?>