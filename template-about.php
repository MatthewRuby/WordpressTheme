<?php
/**
 * Template Name: About
 * @package Ruby
 * @since Ruby 1.0
 */

get_header(); ?>

	<div id="content" class="site-content about-page" role="main">			

        <?php 
            $page = get_page_by_title( 'About' );
            echo $page->post_content;
        ?>
        
	</div><!-- #content .site-content -->

<?php get_footer(); ?>