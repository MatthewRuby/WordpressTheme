<?php
/**
 * Template Name: Grid
 * @package Ruby
 * @since Ruby 1.0
 */

get_header(); ?>

	<div id="content" class="site-content grid" role="main">			

		<?php
			$linksPosts = new WP_Query();
			// category Work - local = 3, prod = 180
			$linksPosts->query('cat=3');		
			$counter = 0;
		?>

		<?php while ($linksPosts->have_posts()) : $linksPosts->the_post(); ?>


			<div class="box <?php foreach((get_the_category()) as $category) { echo $category->slug; }?>">

				<h3 class="title">
					<a href="<?php if(get_post_meta($post->ID, "url", true)) echo get_post_meta($post->ID, "url", true); else the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>

				<div class="featuredImage">
					<a href="<?php if(get_post_meta($post->ID, "url", true)) echo get_post_meta($post->ID, "url", true); else the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				</div>

				<div class="featuredText">
					<a href="<?php if(get_post_meta($post->ID, "url", true)) echo get_post_meta($post->ID, "url", true); else the_permalink(); ?>">
						<?php the_excerpt(); ?>
					</a>
				</div>
				
			</div><!-- .item, .catergories -->

		<?php endwhile; ?>

	</div><!-- #content .site-content -->

<?php get_footer(); ?>