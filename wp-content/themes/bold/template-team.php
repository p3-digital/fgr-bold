<?php
/**
 * Template Name: Team
 */

get_header();
echo get_template_part( '/assets/template-parts/hero' );
?>

<section class="wrap">
	<h4 class="text-center blue-text uppercase section-title"><?php the_field('section_title'); ?></h4>
	<p class="col-xs-12 col-sm-10 col-sm-offset-1 text-center"><?php the_field('page_content'); ?></p>
</section>

<section class="wrap-small mt">
	<div class="leader-row">
		<?php
		$args = array(
			'post_type' => 'leader',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'menu_order'
			);
		$the_query = new WP_Query( $args );
		$posts_count = count($the_query->posts);
		$i = 1;
		$row_index = '1';
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post(); ?>
				<div data-leader="<?php echo $i; ?>" data-row="<?php echo $row_index; ?>" class="col-xs-12 col-sm-6 col-md-3 leader-thumb" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>)">
					<div class="leader-content">
						<h5 class="didot white text-center leader-name"><?php the_title(); ?></h5>
						<h6 class="uppercase white text-center leader-title"><?php the_field('title'); ?></h6>
						<a href="#more" class="more white uppercase">More</a>
						<p class="hidden linkedin"><?php the_field('linkedin'); ?></p>
						<p class="hidden bio"><?php the_field('bio'); ?></p>
						<p class="hidden email"><?php the_field('email'); ?></p>
					</div>
				</div>
				<div class="mobile-leader-content" id="leader-id-<?php echo $i; ?>">
					<div class="bio"><p><?php the_field('bio'); ?></p></div>
					<div class="close-bio">x</div>
					<div class="bio-links-wrap">
						<?php if ( get_field('linkedin') !== '' ): ?>
							<a target="_blank" href="<?php the_field('LinkedIn'); ?>" class="linkedin">LinkedIn</a>
						<?php endif ?>
						<?php if ( get_field('email') !== '' ): ?>
							<a href="mailto:<?php the_field('email'); ?>" class="email">Email</a>
						<?php endif ?>
					</div>
				</div>
				<?php 
				if($i %4 == 0 && $posts_count !== $i){
					echo '<div class="clearfix"></div><div class="leader-info-row" id="leader-info-row-'.$row_index.'"></div></div><div class="leader-row">';
					$row_index++;
				}
				$i++;
			}
			wp_reset_postdata();
		}
		?>
		<div class="clearfix"></div>
		<div class="leader-info-row" id="leader-info-row-<?php echo $row_index; ?>"></div>
	</div> <!-- end leader row -->	
</section>
<?php
get_footer();
?>