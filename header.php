<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author		Alwyn Barry
 * @copyright	2021
 * For use in	w3-theme
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version		1.0.2
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
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">


	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wt' ); ?></a>

	
	<?php if ( is_active_sidebar( 'wt-site-topbar-left' ) || is_active_sidebar( 'wt-site-topbar-right' ) ) { ?>
	<header id="wt-top-bar" class="w3-bar wt-site-top-bar wt-no-print">
		<?php if ( is_active_sidebar( 'wt-site-topbar-left' ) ) { ?>
		<div class="w3-bar-item w3-mobile">
			<div class="w3-bar wt-top-bar-left">
				<?php dynamic_sidebar( 'wt-site-topbar-left' ); ?>
			</div>
		</div>
		<?php } // end if ?>
		<?php if ( is_active_sidebar( 'wt-site-topbar-right' ) ) { ?>
		<div class="w3-bar-item w3-right w3-mobile">
			<div class="w3-bar wt-top-bar-right">
				<?php dynamic_sidebar( 'wt-site-topbar-right' ); ?>
			</div>
		</div>
		<?php } // end if ?>
	</header> <!-- #wt-top-bar -->
	<?php } // end if ?>


	<header id="masthead" class="w3-container w3-bar site-header">

		<button class="w3-bar-item w3-button w3-hide-large w3-padding-large w3-hover-white w3-large w3-red w3m-control w3m-open-button wt-no-print" onclick="w3m_openSideMenu()" aria-controls="primary-menu" aria-expanded="false">☰</button>

		<div class="w3-bar-item site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) {
			?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php } else { ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php } // end if ?>
			<?php
			$wt_description = get_bloginfo( 'description', 'display' );
			if ( $wt_description || is_customize_preview() ) {
			?>
				<p class="site-description"><?php echo $wt_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php } // end if ?>
		</div><!-- .site-branding -->

		<nav class="w3m w3-right w3-bar-item wt-no-print">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container_class' => 'main-menu-bar w3-bar',
					'items_wrap'	 => '%3$s',
					'walker' 		 => new W3M_Nav_Walker()
				)
			);
			?>
		</nav><!-- #site-navigation -->

	
	</header><!-- #masthead -->

	
	<div class="below-sticky"><!-- Used to pad down content below a fixed sticky header --></div>
	
