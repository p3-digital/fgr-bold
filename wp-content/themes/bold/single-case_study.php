<?php
get_header();
?>

<div class="no-mobile-wrap no-p hero-offset">
	<div class="inner-hero inner-hero-big" style="background-image: url(<?php the_field('hero_image');?> );">
		<div class="hero-overlay">
			<h1 class="uppercase text-center white"><?php the_title(); ?></h1> 
			<?php
			 	$cs_term = get_the_terms($post->ID, 'cs_category');
			 	$cs_term_slug = $cs_term[0]->slug;
			 	echo '<h3 class="white didot text-center">'.strtolower(get_field('hero_subtitle')).'</h3>';
			 ?>
		</div>   	 	
	</div>
</div>

<section class="wrap-small">
	<div class="col-xs-12 col-sm-4 cs-facts">
		<?php
		if( have_rows('sidebar_facts') ):
		    while ( have_rows('sidebar_facts') ) : the_row();
		        $rt = get_sub_field('row_title'); 
		        $rf = get_sub_field('row_fact'); 
		?>
			<h6 class="red-text uppercase"><?php echo $rt; ?></h6>
			<h5 class="red-text didot"><?php echo $rf; ?></h5>
		<?php 
			endwhile;
		endif;
		?>
	</div>
	<div class="col-xs-12 col-sm-8">
		<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
				the_content();
			} // end while
		} // end if
		?>
	</div>
</section>

<div class="clearfix"></div>

<section class="wrap">
	<div id="case-study-carousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php
		  	if( have_rows('carousel') ):
		  		$n = 0;
		  	    while ( have_rows('carousel') ) : the_row();
			  	    if ($n == 0) {
			  	    	$class = 'class="active"';
			  	    }else{
			  	    	$class = '';
			  	    }  
		  	?>
		  		<li data-target="#case-study-carousel" data-slide-to="<?php echo $n; ?>" <?php echo $class; ?>></li>
		  	<?php 
		  			$n++;
		  		endwhile;
		  	endif;
		  	?>
		</ol>
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	  	<?php
	  	if( have_rows('carousel') ):
	  		$i = 0;
	  	    while ( have_rows('carousel') ) : the_row();
		  	    if ($i == 0) {
		  	    	$class = 'active';
		  	    }else{
		  	    	$class = '';
		  	    }
	  	        $caption = get_sub_field('caption');
	  	        $image = get_sub_field('image');  
	  	?>
	  		<div class="item <?php echo $class; ?>">
		      <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
		      <?php if ($caption !== ''): ?>
			      <div class="image-caption wrap">
			      	<?php 
			      	$my_string = $caption;
					if(strlen($my_string ) > 75){
						$string = substr($my_string, 0, 75)."..."; ?>
						<p class="shortened"><?php echo $string; ?></p>
						<p class="long-text"><?php echo $caption; ?></p>
						<a href="#" class="open-caption">open</a>
					<?php }else{ ?>
						<p><?php echo $caption; ?></p>
					<?php } ?>
			      </div>
			  <?php endif ?>
		    </div>
	  	<?php 
	  			$i++;
	  		endwhile;
	  	else :
	  	    // no rows found
	  	endif;
	  	?>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control hidden-xs" href="#case-study-carousel" role="button" data-slide="prev">
	    <img src="/wp-content/themes/bold/assets/img/Slider-Left-Arrow.svg" alt="Next">
	  </a>
	  <a class="right carousel-control hidden-xs" href="#case-study-carousel" role="button" data-slide="next">
	    <img src="/wp-content/themes/bold/assets/img/Slider-Right-Arrow.svg" alt="Next">
	  </a>
	</div>
</section>


<section class="col-xs-12 col-sm-8 col-sm-offset-2 pt">
	<div class="section">
		<h3 class="blue-text didot text-center"><?php echo the_field('testimonial'); ?></h3>
	</div>
</section>

<section class="wrap-small fce-section text-center">
	<h4 class="text-center uppercase blue-text section-title">Featured Catered Events</h4>
	<?php
	$args = array(
		'post_type' => 'case_study',
		'posts_per_page' => 3,
		'post__not_in' => array($post->ID),
		'tax_query' => array(
				array(
					'taxonomy' => 'cs_category',
					'field'    => 'slug',
					'terms'    => $cs_term_slug,
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