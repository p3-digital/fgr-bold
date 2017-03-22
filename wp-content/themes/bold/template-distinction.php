	<?php
/**
 * Template Name: Dstinction On Demand
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

<section class="no-mobile-wrap">
	<div class="red-bg content-callout pb pt wrap">
		<img class="center-star" src="<?php echo get_template_directory_uri(); ?>/assets/img/transparent-star.png" alt="Bold">
		<h3 class="text-center white didot"><?php the_field('red_block_text'); ?></h3>
	</div>
</section>

<section class="catering grey-bg">
	<div class="pt">
		<h4 class="text-center ce-title blue-text section-title">BOLD OFFERINGS</h4>
		<!-- tabs -->
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 hidden-xs">
			<ul class="nav nav-tabs" role="tablist">
				<?php
				$service = get_field('offering');
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
	<div class="tab-content ce-content no-mobile-wrap">
		<?php
		if( have_rows('offering') ):
			$i = 0;
		    while ( have_rows('offering') ) : the_row();
		        $description = get_sub_field('description');
		        $title = get_sub_field('name'); 
		        if ($i == 0) {
		        	$class = 'active';
		        }else{
		        	$class = '';
		        }
		?>	
			<div role="tabpanel" class="tab-pane catering-experience-tab <?php echo $class; ?>" id="index-<?php echo $i; ?>">
				<h3 class="mobile-ce-section-toggle text-center hidden-sm hidden-md hidden-lg didot"><a class="red-text" href="" class=""><?php echo $title; ?></a></h3>
				<div class="wrap-small no-pad">
					<div class="section no-pad"><?php echo $description; ?></div>
					<div class="clearfix"></div>
					<div class="col-xs-12 col-sm-4 offerings-thumb">
						<img src="<?php the_sub_field('image_1'); ?>" alt="<?php echo $title; ?>">
					</div>
					<div class="col-xs-12 col-sm-4 offerings-thumb">
						<img src="<?php the_sub_field('image_2'); ?>" alt="<?php echo $title; ?>">
					</div>
					<div class="col-xs-12 col-sm-4 offerings-thumb">
						<img src="<?php the_sub_field('image_3'); ?>" alt="<?php echo $title; ?>">
					</div>
				</div>
			</div>
			<?php
			$i++;
			?>
			    	
		<?php endwhile; ?>
		<?php endif; ?>
	</div>	
	<div>
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 pb">
			<div class="center-btn center-multiple">
				<a class="main-btn-blue" href="<?php the_field('button_1_page'); ?>"><?php the_field('button_1_text'); ?></a>
				<a class="main-btn-blue" href="<?php the_field('button_2_page'); ?>"><?php the_field('button_2_text'); ?></a>
			</div>
		</div>
	</div>
</section>

<section class="wrap">
	<h4 class="text-center ce-title blue-text section-title">AWARDS AND RECOGNITION</h4>
	<?php
	if( have_rows('logos') ):
	    while ( have_rows('logos') ) : the_row();
	        $logo = get_sub_field('logo'); 
	?>	
		<div class="col-xs-12 col-sm-6 col-md-3 mb featured-image">
			<?php
			if ( get_sub_field('page_type') == 'page' ) {
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
	endif;
	?>
	    	
</section>

<?php
get_footer();
?>