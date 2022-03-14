<?php
/**
 * Template part for displaying the end of the column for the main content and then the sidebar column
 * NOTE: sidbarcolumns.php must be called before the main content and before this function.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @author		Alwyn Barry
 * @copyright	2021
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version		1.0.0
 * 
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
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
