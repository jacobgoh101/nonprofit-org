<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nonprofit_Organization
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nonprofit-org' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="top-navigation-container">
				<nav id="top-navigation" class="top-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'menu_id' => 'top-menu' , 'depth' => 0) ); ?>
				</nav><!-- #site-navigation -->
			</div>

			<div class="site-branding">
				<h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>

				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">		
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'depth' => 2 ) ); ?>
			</nav><!-- #site-navigation -->

			<div class="navicon closed"><i class="fa fa-navicon"></i></div>
			<nav id="mobile-navigation" class="mobile-navigation" role="navigation">						
				<?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'menu_id' => 'mobile-menu', 'depth' => 2 ) ); ?>
			</nav><!-- #site-navigation -->

			<a href="http://localhost/nonprofit-org/donations/save-the-kids/" class="donate-now-link">
				<div class="donate-now">
					<h3>Donate<br/><i class="fa fa-heart"></i> Now <i class="fa fa-heart"></i></h3>
				</div>
			</a> <!-- #Donate Now Box -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">
