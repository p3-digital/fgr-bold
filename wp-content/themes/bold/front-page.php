<?php
get_header();
?>
    	
<div class="home-hero wrap hero-offset">
	<?php 
	$left_images = get_field('left_images' ); // get all the rows
	$left_rand = $left_images[ array_rand( $left_images ) ]; // get a random row
	$left_image = $left_rand['image' ]; // get the sub field value 

	$right_images = get_field('right_images' ); // get all the rows
	$right_rand = $right_images[ array_rand( $right_images ) ]; // get a random row
	$right_image = $right_rand['image' ]; // get the sub field value 
	?>
	<img src="<?php echo $image[0]; ?>" />
	<div class="col-xs-12 col-sm-6 hh-col" style="background-image:url(<?php echo $left_image; ?>);">
		<div class="overlay-left"></div>
		<div class="hh-hero-content">
			<h6 class="uppercase white"><?php the_field('left_top_subtitle'); ?></h6>
			<h2 class="uppercase white"><?php the_field('left_title'); ?></h2>
			<div class="short-white-underline"></div>
			<h5 class="white didot"><?php the_field('left_bottom_subtitle'); ?></h5>
			<div class="center-btn"><a href="<?php the_field('left_page_link'); ?>" class="main-btn-red main-btn-small mt">Explore</a></div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 hh-col" style="background-image:url(<?php echo $right_image; ?>);">
		<div class="overlay-right"></div>
		<div class="hh-hero-content">
			<h6 class="uppercase white"><?php the_field('right_top_subtitle'); ?></h6>
			<h2 class="uppercase white"><?php the_field('right_title'); ?></h2>
			<div class="short-white-underline"></div>
			<h5 class="white didot"><?php the_field('right_bottom_subtitle'); ?></h5>
			<div class="center-btn"><a href="<?php the_field('right_page_link'); ?>" class="main-btn-red main-btn-small mt">Explore</a></div>
		</div>
	</div>
	<div id="transparent-star-wrap">
		<img class="hidden-xs" id="transparent-star" src="<?php echo get_template_directory_uri() . '/assets/img/bold-Logo-Star-White.svg'; ?>" alt="Bold">
	</div>
</div>

<section>
	<div class="col-xs-12 col-sm-8 col-sm-offset-2 pt">
		<?php the_field('text'); ?>
	</div>
	<div class="clearfix"></div>
	<div class="center-btn">
		<a href="<?php the_field('page'); ?>" class="main-btn-blue main-btn-small"><?php the_field('link_text'); ?></a>
	</div>
</section>

<section class="pt wrap">
	<?php
	if( have_rows('block') ):
	    while ( have_rows('block') ) : the_row();
	        $img = get_sub_field('image');
	        $text = get_sub_field('text');
	        $page_type = get_sub_field('page_type');
	        if ($page_type == 'page') {
	        	$url = get_sub_field('page');
	        	$target = '';
	        }else{
	        	$url = get_sub_field('custom_url');
	        	$target = 'target="_blank"';
	        }
	?>
		<div class="col-xs-12 col-sm-4">
			<div class="section-block fp-trio" style="background-image: url(<?php echo $img; ?>);">
				<div class="overlay">
					<h3 class="uppercase white text-center"><?php echo $text; ?></h3>
					<a <?php echo $target; ?> href="<?php echo $url; ?>" class="hidden"><?php echo $text; ?></a>
				</div>
			</div>
		</div>
	<?php 
		endwhile;
	endif;
	?>
	    	
</section>
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