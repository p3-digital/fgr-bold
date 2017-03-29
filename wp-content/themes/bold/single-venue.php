<?php
get_header();
echo get_template_part( '/assets/template-parts/hero' );
?>


<section class="wrap-small">
	<div class="col-xs-12 col-sm-4 cs-facts">
		<img class="venue-logo" src="<?php the_field('venue_logo'); ?>" alt="<?php the_title(); ?>">
		<h6 class="red-text uppercase pb"><?php the_field('venue_address') ?></h6>
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
		<a href="/portfolio" class="main-btn-blue main-btn-xl mt book-venue mb">Book This Venue</a>
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
		<p class="blue-text didot text-center"><?php echo the_field('testimonial'); ?></p>
	</div>
</section>

<section class="wrap-small fce-section">
	<h4 class="text-center uppercase blue-text section-title">OTHER FEATURED VENUES</h4>
	<?php
	$args = array(
		'post_type' => 'venue',
		'posts_per_page' => -1,
		'post__not_in' => array($post->ID),
		);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		$i = 1;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();?>
			<div class="col-xs-12 col-sm-4 venue-thumb featured-venue-padded">
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>" alt="<?php echo the_title(); ?>">	
				<h3 class="red-text didot text-center venue-header"><?php echo the_title(); ?></h3>
				<div class="content">
					<div><?php the_field('excerpt'); ?></div>
					<p><a href="<?php the_permalink(); ?>" class="red-text underline">Explore <?php the_title(); ?></a></p>
				</div>
			</div>
		<?php 
		if ($i % 3 == 0) {
			echo '<div class="clearfix"></div>';
		}
			$i++;
		}
		wp_reset_postdata();
	}
	?>
	<div class="clearfix"></div>
	<div class="center-btn"><a href="/portfolio" class="main-btn-blue main-btn-xl mt">RETURN TO VENUE LISTINGS</a></div>
</section>


<?php
get_footer();
?>