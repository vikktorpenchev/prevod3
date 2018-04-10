<?php
/**
 *
 * Template Name: Taxonomy-Bands
 *
 *
 * Всички променливи *******
 * използвани в документа **
 * са дефинирани в началото
 *
 * @package MDLWP
 * @subpackage prevod3-2018
 */
?>

<?php // variables:

// your taxonomy name
$tax = 'band'; 

// get the terms of taxonomy
$terms = get_terms( $tax, $args = array( 
    'hide_empty' => false, // do not hide empty terms
));

        // Gets the stored background color value 
        $color_value = get_post_meta( get_the_ID(), 'mdlwp-bg-color', true ); 
        // Checks and returns the color value
  	$color = (!empty( $color_value ) ? 'background-color:' . $color_value . ';' : '');

  	// Gets the stored title color value 
        $title_color_value = get_post_meta( get_the_ID(), 'mdlwp-title-color', true ); 
        // Checks and returns the color value
  	$title_color = (!empty( $title_color_value ) ? 'color:' . $title_color_value . ';' : '');

  	// Gets the stored height value 
        $height_value = get_post_meta( get_the_ID(), 'mdlwp-height', true ); 
        // Checks and returns the height value
  	$height = (!empty( $height_value ) ? 'height:' . $height_value . ';' : '');

  	 // Gets the uploaded featured image
  	$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  	// Checks and returns the featured image
  	$bg = (!empty( $featured_img ) ? "background-image: url('". $featured_img[0] ."');" : '');
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main mdl-grid mdlwp-1200" role="main">



                    <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
                                        <?php
                                        // loop through all terms
                                            foreach ( $terms as $term ) {

                                            // Get the term link
                                            $term_link = get_term_link( $term );

                                                if( $term->count > 0 ) {
                                                    // display link to term archive ?>
                    <div id="band-name" class="<?php echo '$term->name';?>-image">
                        	<?php 

	if ( $term->term_image ) {
		$featured_img = wp_get_attachment_image_src( $term->term_image, 'full' )[0];
                $bg = (!empty( $featured_img ) ? "background-image: url('". $featured_img ."');" : '');
	} ?>
                        <!-- mdl-card__media -->
                        <div class="mdl-card__media" style="<?php echo $color . $bg . $height; ?> ">
                        </div>
                        band name
                    </div>
                                                    <?php echo '<a href="' . esc_url( $term_link ) . '">'
                                                            . '<button class="mdl-button mdl-js-button mdl-button--primary">' . $term->name . '</button></a>';
                                                }

                                                elseif( $term->count !== 0 )
                                                    // display name
                                                    echo '' . $term->name .'';
                                            } //foreach
                            } //if not empty
                     ?>   
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>