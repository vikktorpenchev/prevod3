<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MDLWP
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main mdl-grid mdlwp-1200" role="main">

		<?php if ( have_posts() ) : ?>

			<?php do_action( 'mdlwp_before_content' ); ?>
                    
                        <?php // show three posts on index ---OR---
                              // show nine posts on other pages
                              // $show_posts_no 

                            if (is_home() | is_front_page()) 
                                {   $show_posts_no=3; } else 
                                {   $show_posts_no=9; }
                        ?>
                    
			<?php /* Start the Loop */ ?>
                    
                        <?php // Define custom query parameters */
                        $custom_query_args = array(
                            'category_name'             => 'prevod',
                            'post_type'                 => 'post',
                            'nopaging'                  => false,
                            'posts_per_page'            => $show_posts_no,
                            'ignore_sticky_posts'       => 1,
                        );

                        // Get current page and append to custom query parameters array
                        $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

                        // Instantiate custom query
                        $custom_query = new WP_Query( $custom_query_args );

                        // Pagination fix
                        // wp_reset_query();

                        // Output custom query loop
                        if ( $custom_query->have_posts() ) :
                            while ( $custom_query->have_posts() ) :
                                $custom_query->the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					// get_template_part( 'template-parts/content', get_post_format() );
                                        get_template_part( 'template-parts/index', '3_recent_posts' );
				?>

			<?php endwhile; ?>
                        <?php endif;
                        // Reset postdata
                        wp_reset_postdata(); ?>

			<?php do_action( 'mdlwp_before_pagination' ); ?>

			<?php mdlwp_posts_navigation(); ?>

			<?php do_action( 'mdlwp_after_pagination' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		<?php do_action( 'mdlwp_after_content' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>