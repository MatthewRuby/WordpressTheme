<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Ruby
 * @since Ruby 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content single-work slider" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <div class="carousel">
            <div class="window">
                <div class="frame">
                    <div class="track">
                        <div class="itemWrapper">

        				<?php
                            $argsThumb = array(
                                'order'          => 'ASC',
                                'post_type'      => 'attachment',
                                'post_parent'    => $post->ID,
                                'post_mime_type' => 'image',
                                'post_status'    => null
                            );
                            $attachments = get_posts($argsThumb);
                            if ($attachments) {
                                foreach ($attachments as $attachment) {
                                    //echo apply_filters('the_title', $attachment->post_title);
                                    echo '<div class="item">';
                                    echo '<div class="child">';
                                    echo '<img src="'.wp_get_attachment_url($attachment->ID, 'thumbnail', false, false).'" />';
                                    echo '</div><!-- .child -->';
                                    echo '</div><!-- .item -->';
                                }
                            }

                            $key = "video_url";
                            if(get_post_meta($post->ID, $key, true)) {
                                echo '<div class="item">';
                                echo '<div class="child video">';
                                $key = "video_url";
                                echo '<iframe src="' . get_post_meta($post->ID, $key, true) . '"></iframe>';
                                echo '</div><!-- .child -->';
                                echo '</div><!-- .item -->';
                            }

                            $key2 = "video_url2";
                            if(get_post_meta($post->ID, $key2, true)) {
                                echo '<div class="item">';
                                echo '<div class="child video">';
                                $key = "video_url";
                                echo '<iframe src="' . get_post_meta($post->ID, $key2, true) . '"></iframe>';
                                echo '</div><!-- .child -->';
                                echo '</div><!-- .item -->';
                            }

                            $key3 = "video_url3";
                            if(get_post_meta($post->ID, $key3, true)) {
                                echo '<div class="item">';
                                echo '<div class="child video">';
                                $key = "video_url";
                                echo '<iframe src="' . get_post_meta($post->ID, $key3, true) . '"></iframe>';
                                echo '</div><!-- .child -->';
                                echo '</div><!-- .item -->';
                            }

                        ?>
                                   
                        </div><!-- .itemWrapper -->
                    </div><!-- .track -->
                </div><!-- .frame -->
            </div><!-- .window -->
            <nav class="sliderNav">
                <a href="javascript:;" class="prev"><b>prev</b></a>
                <a href="javascript:;" class="next"><b>next</b></a>
            </nav>
        </div><!-- .carousel -->

        <div class="workDetails">
            <h2 class="title">
                <?php echo the_title(); ?>
            </h2>
            <?php 
                echo strip_tags(get_the_content(), '<p><a><h2><blockquote><code><ul><li><i><em><strong>');
            ?>
        </div>
		
		<div class="relatedWork">
			<div class="prevWork">					    
			<?php

				$postID = $post->ID;
				$prevPost = get_previous_post(true);
				$prevID = $prevPost->ID;

				if($postID != $prevID && $prevID != ''){
					$prevTitle = get_the_title($prevID);
					$prevThumbnail = get_the_post_thumbnail($prevID, array(150,150) );
					$prevPostLink = get_permalink($prevID);
					$prevPostExcerpt = get_the_excerpt($prevID);
				
				    echo '<h3 class="title"><a href="' . $prevPostLink . '">' . $prevTitle . '</a></h3>';
					echo '<a href="' . $prevPostLink . '" class="thumb">' . $prevThumbnail . '</a>';
		//			echo '<p class="excerpt"><a href="' . $prevPostLink . '">' . $prevPostExcerpt . '</a></p>';

				}
                
			?>
			</div>
			
			<div class="nextWork">
			<?php
                
				$nextPost = get_next_post(true);
				$nextID = $nextPost->ID;

				if($postID != $nextID && $nextID != ''){
					$nextTitle = get_the_title($nextID);
					$nextThumbnail = get_the_post_thumbnail($nextID, array(150,150) );
					$nextPostLink = get_permalink($nextID);
					$nextPostExcerpt = get_the_excerpt($nextID);
				
					echo '<h3 class="title"><a href="' . $nextPostLink . '">' . $nextTitle . '</a></h3>';
					echo '<a href="' . $nextPostLink . '" class="thumb">' . $nextThumbnail . '</a>';
			//		echo '<p class="excerpt"><a href="' . $nextPostLink . '">' . $nextPostExcerpt . '</a></p>';
				}
            
			?>
            </div>					
		</div><!-- .relatedWork -->

	<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->
		
<?php get_footer(); ?>