<?php
/**
 * Template Name: Catering
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
<section class="wrap-small">
	<h4 class="text-center blue-text section-title"><?php the_field('fw_section_title'); ?></h4>
	<p class="desktop-center"><?php the_field('fw_section_content'); ?></p>
</section>
<section class="catering grey-bg">
	<div class="grey-bg pt">
		<h4 class="text-center ce-title blue-text section-title"><?php the_field('es_section_title'); ?></h4>
		<!-- tabs -->
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 hidden-xs hidden-sm">
			<ul class="nav nav-tabs" role="tablist">
				<?php
				$ce = get_field('catered_experiences');
				if($ce){
					$i = 0;
					foreach($ce as $row){
						if($i == 0){
							$class = 'active';
						}else{
							$class = '';
						}
						 echo '<li role="presentation" class="col-xs-12 col-sm-4 ce-tab '.$class.'""><h5><a class="red-text didot" href="#index-'.$i.'" role="tab" data-toggle="tab">'.$row['title'].'</a></h5></li>';
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
		if( have_rows('catered_experiences') ):
			$n = 0;
		    while ( have_rows('catered_experiences') ) : the_row();
		        $title = get_sub_field('title');
		        $description = get_sub_field('description'); 
		        $menu = get_sub_field('menu_upload'); 
		        if($n == 0){
					$active = 'active';
				}else{
					$active = '';
				}
		?>
			<div role="tabpanel" class="tab-pane catering-experience-tab experience-<?php echo $n; ?>" id="index-<?php echo $n; ?>">
				<h3 class="mobile-ce-section-toggle text-center hidden-md hidden-lg"><a class="red-text" href="" class=""><?php echo $title; ?></a></h3>
				<div class="ce-description">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<p><?php echo $description; ?></p>
					</div>
				</div>
				<div class="ce-inner-content">
					<div class="col-xs-12 col-md-6 ce-sidebar-wrap">
						<div class="ce-inner-sidebar">
							<h5 class="white didot">Explore <?php echo $title; ?></h5>
							<h5 class="white didot">menu samples below:</h5>
							<ul class="menu-samples">
								<?php
								if( have_rows('menu') ):
									$g = 0;
								    while ( have_rows('menu') ) : the_row();
								    	if($g == 0){
											$active = 'active';
										}else{
											$active = '';
										}
								        $menu_title = get_sub_field('menu_title'); 
								        $badChars = array(' ');
										$menu = str_replace($badChars, '-', $menu_title);
								?>
										<li><a class="menu-experience white uppercase <?php echo $active; ?>" data-experience="experience-<?php echo $n; ?>" data-pdf="menu-<?php echo strtolower($menu); ?>" data-menu="menu-sample-<?php echo $g; ?>" href="#"><?php echo $menu_title; ?></a></li>
								<?php 
									$g++;
									endwhile;
								endif;
								?>
							</ul>
							<?php
								if( have_rows('menu') ):
									$d = 0;
								    while ( have_rows('menu') ) : the_row();
								    	if($d == 0){
											$active = 'active';
										}else{
											$active = '';
										}
										$badChars = array(' ');
										$menu = str_replace($badChars, '-', get_sub_field('menu_title'));
								?>
										<a target="_blank" id="menu-<?php echo strtolower($menu); ?>" download href="<?php the_sub_field('menu_upload'); ?>" class="<?php echo $active; ?> pdf-menu hidden-xs hidden-sm">print sample menus</a>
								<?php 
									$d++;
									endwhile;
								endif;
								?>	
						</div>
					</div>
					<?php
						if( have_rows('menu') ):
							$h = 0;
						    while ( have_rows('menu') ) : the_row();
								if($h == 0){
									$active = 'active';
								}else{
									$active = '';
								}
						        $menu_title = get_sub_field('menu_title'); 
						?>
							<div class="menu-wrapper col-xs-12 col-md-6 <?php echo $active; ?>" id="menu-sample-<?php echo $h; ?>">
								<div class="menu">
									<h4 class="red-text text-center uppercase"><?php echo $menu_title; ?></h4>
									<?php
									//menu section repeater
									if( have_rows('menu_section') ):
									    while ( have_rows('menu_section') ) : the_row();
									        $menu_section_name = get_sub_field('menu_section_name'); 
									?>
											<h5 class="text-center red-text didot"><?php echo $menu_section_name; ?></h5>
											<?php
											// menu section items
											if( have_rows('menu_item') ):
											    while ( have_rows('menu_item') ) : the_row();
											        $item = get_sub_field('item'); 
											?>
												<p class="text-center"><?php echo $item; ?></p>
											<?php 
												endwhile;
											endif; // end menu section items
										endwhile;
									endif;// end menu section repeater
									?>
								</div>	
							</div>
						<?php 
							$h++;
							endwhile;
						endif;
					?>
				</div>
		    </div>
		<?php 
			$n++;
			endwhile;
		endif;
		?>
	</div>
	    	
</section>

<div class="clearfix"></div>

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
					'terms'    => 'catering',
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
	<div class="grey-bg no-mobile-wrap">
		<h4 class="text-center red-text section-title wrap-small"><?php the_field('cta_section_title'); ?></h4>
		<div class="wrap-small no-pt">
			<p class="text-center"><?php the_field('section_content'); ?></p>
		</div>
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<div class="center-btn center-multiple">
			<?php
			if( have_rows('call_to_actions') ):
			    while ( have_rows('call_to_actions') ) : the_row();
			        $label = get_sub_field('label'); 
			        $page = get_sub_field('page'); 
			?>
				<a href="<?php echo $page; ?>" class="main-btn-red"><?php echo $label; ?></a>
			<?php 
				endwhile;
			else :
			    // no rows found
			endif;
			?>	
			</div>
		</div>
	</div>
</section>


<?php
get_footer();
?>