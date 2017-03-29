<?php
$page_id = get_the_ID();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="site-wrap">
		<header id="header" role="banner">
			<div class="sem-header">
				<a href="<?php echo site_url(); ?>"><img src="/wp-content/themes/bold/assets/img/bold-white.svg" alt="Bold | Fifth Group"></a>
			</div>
		</header>