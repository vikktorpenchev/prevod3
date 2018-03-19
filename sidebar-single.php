<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package MDLWP
 */

if ( ! is_active_sidebar( 'sidebar-single' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area mdl-cell mdl-cell--4-col mdl-cell--4-col-desktop" role="complementary">
	<?php dynamic_sidebar( 'sidebar-single' ); ?>
</div><!-- #secondary -->
