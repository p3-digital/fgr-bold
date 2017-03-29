<?php
/**
 * Template Name: SEM
 */

get_header('sem');
?>







<!-- hero -->
<div class="no-mobile-wrap hero hero-offset">
	<div class="inner-hero inner-hero-sem" style="background-image: url(<?php the_field('hero_image');?> );">
		<div class="hero-overlay">	
			<div class="sem-hero-content">
				<h3 class="white didot text-center"><?php the_field('hero_text'); ?></h3>  
				<h1 class="uppercase text-center white"><?php the_field('hero_subtext'); ?></h1>	
			</div>
		</div>
	</div>
</div>







<!-- page content -->
<section class="wrap-small">
	<h4 class="col-xs-12 text-center blue-text uppercase section-title"><?php the_field('pc_section_title'); ?></h4>
	<div class="cols">
		<div class="col-xs-12"><?php the_field('page_content'); ?></div>
	</div>
</section>


<!-- form -->
<div class="clearfix"></div>
<div class="wrap">
	<div class="section grey-bg">
		<h4 class="uppercase text-center blue-text"><?php the_field('form_title'); ?></h4>
		<p class="text-center"><?php the_field('form_content'); ?></p>
		<div class="form wrap-small"><?php the_field('form'); ?></div>
	</div>
</div>





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




<!-- CTA  -->
<div class="clearfix"></div>
<div class="wrap-small">
	<div class="center-btn pt">
		<a href="<?php the_field('cta_page'); ?>" class="main-btn-blue main-btn-small"><?php the_field('cta_text'); ?></a>
	</div>
</div>






<!-- logos  -->
<div class="clearfix"></div>
<div class="wrap">
	<div class="section grey-bg">
		<h4 class="uppercase text-center blue-text"><?php the_field('section_title'); ?></h4>
		<?php
		if( have_rows('featured') ):
		    while ( have_rows('featured') ) : the_row();
		        $logo = get_sub_field('logo'); 
			?>
			<div class="col-xs-12 col-sm-3 featured-image">
				<?php
				if ( get_sub_field('link_type') == 'page' ) {
		        	$url = get_sub_field('page');?>
		        	<a class="logo" href="<?php echo $url; ?>">
						<img src="<?php echo $logo; ?>" alt="logo">
					</a>
		        <?php }else{ 
		        	$url = get_sub_field('custom_url');
		        	$target = 'target="_blank"';
		        	if ($url !== '') { ?>
		        		<a class="logo" <?php echo $target; ?> href="<?php echo $url; ?>">
							<img src="<?php echo $logo; ?>" alt="logo">
						</a>
		        	<?php } else{ ?>
						<p class="logo">
							<img src="<?php echo $logo; ?>" alt="logo">
						</p>
		        	<?php } ?>
		        <?php } ?>
			</div>
		<?php 
			endwhile;
		else :
		    // no rows found
		endif;
		?>  	
	</div>
</div>








<?php
get_footer();
?>