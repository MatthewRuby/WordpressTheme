<?php
/**
 * Template Name: Slider
 * @package Ruby
 * @since Ruby 1.0
 */

get_header(); ?>

	<div id="content" class="site-content slider" role="main">			

		<div class="carousel">
    	    <div class="window">
    	        <div class="frame">
						<div class="track">
							<div class="itemWrapper">

								<?php
									$linksPosts = new WP_Query();
									// cat Featured - local = 4, prod = 181
									$linksPosts->query('cat=4');		
									while ($linksPosts->have_posts()) : $linksPosts->the_post();
								?>

								<div class="item <?php foreach((get_the_category()) as $category) { echo $category->slug; }?>">

									<div class="child">

										<div class="featuredImage">
											<a href="<?php if(get_post_meta($post->ID, "url", true)) echo get_post_meta($post->ID, "url", true); else the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
										</div>

										<div class="featuredText">
											<h3 class="title">
												<a href="<?php if(get_post_meta($post->ID, "url", true)) echo get_post_meta($post->ID, "url", true); else the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
											<?php the_excerpt(); ?>
										</div>
									</div>
								</div><!-- .item, .catergories -->

								<?php endwhile; ?>
										
						</div>
					</div>
				</div>
			</div>
			
			<nav class="sliderNav">
				<a href="javascript:;" class="prev"><b>prev</b></a>
				<a href="javascript:;" class="next"><b>next</b></a>
			</nav>
			
		</div>

	</div><!-- #content .site-content -->

<?php get_footer(); ?>