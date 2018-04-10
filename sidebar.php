<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package MDLWP
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area mdl-cell mdl-cell--4-col mdl-cell--4-col-desktop" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>


<?php // let's generate info appropriate to the page being displayed
if ( is_home() ) {
 // we're on the home page, so let's show a list of all top-level categories
    wp_list_categories( 'optionall=0&sort_column=name&list=1&children=0' );
} elseif ( is_category() ) {
 // we're looking at a single category view, so let's show _all_ the categories
    wp_list_categories( 'optionall=1&sort_column=name&list=1&children=1&hierarchical=1' );
} elseif ( is_single() ) {
 // we're looking at a single page, so let's not show anything in the sidebar
} elseif ( is_page() ) {
 // we're looking at a static page. Which one?
 if ( is_page( 'About' ) ) {
 // our about page.
 echo "This is my about page!";
 } elseif ( is_page( 'Colophon' ) ) {
 echo "This is my colophon page, running on WordPress " . bloginfo( 'version' ) . "";
 } else {
 // catch-all for other pages
 echo "Vote for Pedro!";
 }
} else {
 // catch-all for everything else (archives, searches, 404s, etc)
 echo "Pedro offers you his protection.";
} // That's all, folks!
?>
</div>

</div><!-- #secondary -->