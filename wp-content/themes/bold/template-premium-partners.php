<?php
/**
 * Template Name: Premium Partners
 */

get_header();
echo get_template_part( '/assets/template-parts/hero' );
?>

<section class="wrap-small">
	<p class="text-center"><?php the_field('main_content'); ?></p>
</section>

<section class="catering">
	<div class="grey-bg pt">
		<h4 class="text-center ce-title blue-text section-title">FEATURED VENUES</h4>
		<!-- tabs -->
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 hidden-xs hidden-sm ">
			<ul class="nav nav-tabs" role="tablist">
				<?php
				$ce = get_field('top_level_venues');
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
		if( have_rows('top_level_venues') ):
			$n = 0;
		    while ( have_rows('top_level_venues') ) : the_row();
		        $title = get_sub_field('service_title');
		        $description = get_sub_field('content'); 
		        if($n == 0){
					$active = 'active';
				}else{
					$active = '';
				}
		?>
			<div role="tabpanel" class="tab-pane catering-experience-tab experience-<?php echo $n; ?>" id="index-<?php echo $n; ?>">
				<h3 class="mobile-ce-section-toggle text-center hidden-md hidden-lg"><a class="red-text" href="" class=""><?php echo $title; ?></a></h3>
				<div class="ce-description venue-thumb">
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

<section class="wrap-small fce-section mb">
	<?php
	if( have_rows('second_level_venues') ):
	    while ( have_rows('second_level_venues') ) : the_row();
	        $img = get_sub_field('image'); 
	        $title = get_sub_field('service_title'); 
	        $content = get_sub_field('content'); 
	?>
		<div class="col-xs-12 col-sm-4 venue-thumb">
			<img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
			<h3 class="red-text didot text-center venue-header"><?php echo $title; ?></h3>
			<div class="content"><?php echo $content; ?></div>
		</div>
	<?php 
		endwhile;
	endif;
	?>
	<div class="clearfix"></div>   	
	<div class="center-btn"><a href="/contact" class="main-btn-blue main-btn-xl mt">BOOK YOUR ATLANTA VENUE</a></div>
</section>


<section class="section no-mobile-wrap no-pb">
	<div class="grey-bg pb">
		<h4 class="text-center red-text section-title pt"><?php the_field('all_venues_title'); ?></h4>
		<div class="wrap-small no-pt"><p class="text-center"><?php the_field('all_venues_content'); ?></p></div>
		<div class="wrap-small">
			<?php
			if( have_rows('all_atlanta_venues') ):
				$i = 1;
			    while ( have_rows('all_atlanta_venues') ) : the_row();
			        $title = get_sub_field('title'); 
			?>
				<div class="col-xs-12 col-sm-6  col-md-4 all-atl-venues-thumb">
					<h3 class="red-text didot-reg venue-location-header"><?php echo $title; ?></h3>
					<?php
					if( have_rows('venues') ):
					    while ( have_rows('venues') ) : the_row();
					        $venue = get_sub_field('venue'); 
					        $link = get_sub_field('link'); 
					?>
							<p class="venue-text"><a target="_blank" href="<?php echo $link; ?>"><?php echo $venue; ?></a></p>
					<?php 
						endwhile;
					endif;
					?>	
				</div>
				 <?php if ( ($i % 3) == 0 ): ?>
			    	<div class="clearfix"></div>
			    <?php endif ?>
			<?php 
					$i++;
				endwhile;
			endif;
			?>	
		</div>
	</div>
</section>


<?php
get_footer();
?>