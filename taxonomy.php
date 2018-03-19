<?php
/**
 * The Template for displaying Category Archive pages.
 */

	get_header();
?>

	<?php if ( have_posts() ) : ?>
		
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Category Archives: %s', 'prevod2' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
			<?php
				$category_description = category_description();
				if ( ! empty( $category_description ) ) :
					echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
				endif;
			?>
		</header>

		<?php prevod2_content_nav( 'nav-above' ); ?>

			<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/* Include the Post-Format-specific template for the content.
					* If you want to overload this in a child theme then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'content', 'index' );

				endwhile;
			?>

		<?php prevod2_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php
			// 404
			get_template_part( 'content', 'none' );
		?>

	<?php
		endif;
		wp_reset_postdata(); // end of the loop.
	?>


<?php get_footer(); ?>