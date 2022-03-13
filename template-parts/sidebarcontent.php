<?php
/**
 * Template part for displaying the end of the column for the main content and then the sidebar column
 * NOTE: sidbarcolumns.php must be called before the main content and before this function.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package w3_theme
 */

?>

<?php if (is_active_sidebar( 'wt-site-sidebar' )) { ?>
	</div> <!-- w3-col l9 -->
	<div class= "w3-col l3 wt-sidebar-surround">
		<?php get_sidebar(); ?>
	</div> <!-- w3-col l3 -->
</div> <!-- w3-row -->
<?php } // end if ?>
