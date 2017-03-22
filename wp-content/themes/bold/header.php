<?php
$page_id = get_the_ID();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="site-wrap">
		<header id="header" role="banner">
			<div class="mobile-header hidden-md hidden-lg">
				<a href="<?php echo site_url(); ?>"><img src="<?php the_field('mobile_logo','option'); ?>" alt="Bold | Fifth Group"></a>
			</div>
			<nav id="main-navigation">
				<div class="mobile-desktop-logo hidden-md hidden-lg">
					<a href="<?php echo site_url(); ?>"><img src="<?php the_field('desktop_logo','option'); ?>" alt="Bold | Fifth Group"></a>
				</div>
				<ul class="nav navbar-nav">
		    		<li class="home-nav-item"><a href="<?php echo site_url(); ?>">Home</a></li>
		    		<?php
		    		if( have_rows('main_navigation', 'option') ):
		    		    while ( have_rows('main_navigation', 'option') ) : the_row();
		    		        $hdd = get_sub_field('has_drop_down', 'option');
		    		        $label = get_sub_field('menu_item_label', 'option');
		    		        $url = get_sub_field('page', 'option');
		    		        $postId = url_to_postid( $url );
		    		        if ($postId == $page_id) {
		    		        	$class = 'active-page';
		    		        }else{
		    		        	$class = '';
		    		        }
		    		        if ($hdd == 0) {?>
		    		        	<li><a class="<?php echo $class; ?>" href="<?php the_sub_field('page', 'option'); ?>"><?php echo $label; ?></a></li>
		    		        <? }else{ ?>
		    		        	<?php 
		    		        	if( have_rows('sub_menu', 'option') ):
		    		        	    while ( have_rows('sub_menu', 'option') ) : the_row();
		    		        	        $sub_menu_label = get_sub_field('sub_menu_label', 'option');
		    		        	        $sub_page = get_sub_field('sub_page', 'option');
		    		        			$postId = url_to_postid( $sub_page );
		    		        			if ($postId == $page_id) {
					    		        	$class = 'active-page';
					    		        }
		    		        		endwhile;
		    		        	endif;
		    		        	?>
		    		        	<li class="has-sub-menu"><a href="#" class="dropdown-toggle <?php echo $class; ?>" data-toggle="dropdown"><?php echo $label; ?></a>

		    		        		<ul class="dropdown-menu">
			    		        	<?php 
			    		        	if( have_rows('sub_menu', 'option') ):
			    		        	    while ( have_rows('sub_menu', 'option') ) : the_row();
			    		        	        $sub_menu_label = get_sub_field('sub_menu_label', 'option');
			    		        	        $sub_page = get_sub_field('sub_page', 'option'); 
			    		        	?>
			    		        		<li><a href="<?php echo $sub_page; ?>"><?php echo $sub_menu_label; ?></a></li>
			    		        	<?php 
			    		        		endwhile;
			    		        	endif;
			    		        	?>
			    		        	</ul>
			    		       	</li> 	
		    		        <?php }
		    			endwhile;
		    		endif;
		    		?>
		    		<li><a class="hidden-sm hidden-md hidden-lg" href="<?php the_field('mobile_fifth_group_link','option'); ?>"><?php the_field('mobile_fifth_group_link_text','option'); ?></a></li>
		      	</ul>
		      	<div class="desktop-logo hidden-xs hidden-sm">
					<a href="<?php echo site_url(); ?>"><img src="<?php the_field('desktop_logo','option'); ?>" alt="Bold | Fifth Group"></a>
				</div>
				<section class="mt social hidden-sm hidden-md hidden-lg">
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
				<div class="clearfix"></div>
				</section>
			</nav>
		    <div class="mobile-menu-toggle"></div>
		</header>