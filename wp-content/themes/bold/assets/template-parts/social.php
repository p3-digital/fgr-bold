<section class="pt social inner-social">
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
	endif;
	?>
</section>