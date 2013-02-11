<?php
/**
 * Template Name: News List
 * @package Ruby
 * @since Ruby 1.0
 */

get_header(); ?>

	<div id="content" class="site-content news-list" role="main">			

		<?php
			$linksPosts = new WP_Query();
			// category News - local = 6, prod = 179
			$linksPosts->query('cat=6');		
			while ($linksPosts->have_posts()) : $linksPosts->the_post();
		?>

		<div class="item">

			<div class="child">

				<header class="title">
					<i class="post-date"> <?php the_time('l, F j, Y') ?> </i>
					<h4 class="post-title"> <?php the_title(); ?> </h4>
				</header>

                <div class="post-content">
				    <?php the_content(); ?>
				</div>

			</div>
			
		</div><!-- .item, .catergories -->

		<?php endwhile; ?>

	</div><!-- #content .site-content -->

<?php get_footer(); ?>