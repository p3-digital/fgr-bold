<div class="clearfix"></div>
<footer id="footer">
	<div class="hidden-xs desktop-footer">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<div class="foot-col col-xs-12 col-sm-4">
				<?php
				if( have_rows('column_1', 'option') ):
				    while ( have_rows('column_1', 'option') ) : the_row();
				        $text = get_sub_field('link_text', 'option');
				        $page_type = get_sub_field('page_type', 'option');
				        if ($page_type == 'page') {
				        	$url = get_sub_field('page_link', 'option');
				        }else{
				        	$url = get_sub_field('custom_url', 'option');
				        }
				?>
					<a class="footer-link" href="<?php echo $url; ?>"><?php echo $text; ?></a>
				<?php 
					endwhile;
				else :
				    // no rows found
				endif;
				?>   	
			</div>
			<div class="foot-col col-xs-12 col-sm-4">
				<?php
				if( have_rows('column_2', 'option') ):
				    while ( have_rows('column_2', 'option') ) : the_row();
				        $text = get_sub_field('link_text', 'option');
				        $page_type = get_sub_field('page_type', 'option');
				        if ($page_type == 'page') {
				        	$url = get_sub_field('page_link', 'option');
				        }else{
				        	$url = get_sub_field('custom_url', 'option');
				        }
				?>
					<a class="footer-link" href="<?php echo $url; ?>"><?php echo $text; ?></a>
				<?php 
					endwhile;
				else :
				    // no rows found
				endif;
				?>
			</div>
			<div class="foot-col col-xs-12 col-sm-4">
				<?php
				if( have_rows('column_3', 'option') ):
				    while ( have_rows('column_3', 'option') ) : the_row();
				        $text = get_sub_field('link_text', 'option');
				        $page_type = get_sub_field('page_type', 'option');
				        if ($page_type == 'page') {
				        	$url = get_sub_field('page_link', 'option');
				        }else{
				        	$url = get_sub_field('custom_url', 'option');
				        }
				?>
					<a class="footer-link" href="<?php echo $url; ?>"><?php echo $text; ?></a>
				<?php 
					endwhile;
				else :
				    // no rows found
				endif;
				?>
				
				<?php
				//socials
				if( have_rows('social_icons', 'option') ):
				    while ( have_rows('social_icons', 'option') ) : the_row();
				        $icon = get_sub_field('icon', 'option'); 
				        $active_icon = get_sub_field('active_icon', 'option');
				        $link = get_sub_field('link', 'option'); 
				?>
				<div class="social-icon">
					<a target="_blank" class="social-link not-active" href="<?php echo $link; ?>"><img src="<?php echo $icon; ?>" alt="Social"></a>
					<a target="_blank" class="social-link active" href="<?php echo $link; ?>"><img src="<?php echo $active_icon; ?>" alt="Social"></a>
				</div>
				<?php 
					endwhile;
				else :
				    // no rows found
				endif;
				?>
				    	
			</div>
		</div>
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 foot-middle">
			<div class="hidden-xs-down col-sm-6">
				<a target="_blank" href="<?php the_field('site_link', 'option'); ?>"><img src="<?php the_field('site_logo', 'option'); ?>" class="footer-logo" alt="Site logo"></a>
			</div>
			<div class="col-xs-12 col-sm-6">
				<a class="pull-right go-to-top" href="#top"><img src="<?php echo get_template_directory_uri() . '/assets/img/Bold-Logo-Star.svg'; ?>" alt="Site logo"></a>
			</div>
		</div>
		<div class="col-xs-12">
			<p class="text-center copyright"><?php the_field('copyright', 'option'); ?></p>
		</div>
	</div>
	<div class="hidden-sm hidden-md hidden-lg mobile-footer wrap">
		<h5 class="white text-center didot">Are you ready to be bold?</h5>
		<div class="center-btn">
			<a href="/contact" class="transparent-white-btn uppercase">Contact Us</a>
		</div>
		<div class="col-xs-12 pt">
			<a class="go-to-top mobile-top" href="#top"><img src="<?php echo get_template_directory_uri() . '/assets/img/Bold-Logo-Star-White.svg'; ?>" alt="Site logo"></a>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</div> <!-- end site wrap -->

<div class="foot-cta red-bg hidden-xs">
	<a href="#" class="close-foot-cta"></a>
	<div class="col-xs-12 col-sm-6">
		<h4 class="white text-center didot text pb">Are you ready to be bold?</h4>
	</div>
	<div class="col-xs-12 col-sm-6">
		<div class="center-btn">
			<a href="/contact" class="transparent-white-btn uppercase no-m foot-btn">Contact Us</a>
		</div>
	</div>
</div>






</body>
</html>