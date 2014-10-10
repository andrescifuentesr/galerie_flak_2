<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package galerie_flak
 * @since galerie_flak 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = "Ancient Tribal Art from Africa, Oceania and North America";
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'galerie_flak' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!--
/* @license
 * MyFonts Webfont Build ID 2502753, 2013-03-12T17:51:19-0400
 * 
 * The fonts listed in this notice are subject to the End User License
 * Agreement(s) entered into by the website owner. All other parties are 
 * explicitly restricted from using the Licensed Webfonts(s).
 * 
 * You may obtain a valid license at the URLs below.
 * 
 * Webfont: Helvetica 25 UltraLight by Linotype
 * URL: http://www.myfonts.com/fonts/linotype/neue-helvetica/helvetica-25-ultra-light/
 * Copyright: Part of the digitally encoded machine readable outline data for producing
 * the Typefaces provided is copyrighted &#x00A9; 1988 - 2006 Linotype GmbH,
 * www.linotype.com. All rights reserved. This software is the property of Linotype
 * GmbH, and may not be repro
 * 
 * 
 * License: http://www.myfonts.com/viewlicense?type=web&buildid=2502753
 * 
 * © 2013 MyFonts Inc
*/

-->

<script type="text/javascript" src="http://www.galerieflak.com/galerie_flak_2/MyFontsWebfontsOrderM4542310/MyFontsWebfontsOrderM4542310.js"></script>

<!-- Start of Facebook Meta Tags by shailan (http://shailan.com) -->
	<?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumnail'); ?>
	<?php if ($fb_image) : ?>
	    <meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
	<?php endif; ?>
	
	<?php $link_actuel = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>

	<meta property="og:url" content="http://<?php echo $link_actuel; ?>" />
	<meta property="og:title" content="<?php echo $post->post_title; ?>" />  
	<meta property="og:description" content="<?php the_content(); ?>" />
<!-- End of Facebook Meta Tags -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	
	<div id="bloc-lang"><?php echo qTranslateSlug_generateLanguageSelectCode(); ?></div>
	<div style="clear:both"></style>
	
	<header id="masthead" class="site-header clearfix" role="banner">
		
		<hgroup>
			<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</hgroup>

		<nav role="navigation" class="site-navigation main-navigation">
			<h1 id="test" class="assistive-text test"><?php _e( 'Menu &#9776;', 'galerie_flak' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'galerie_flak' ); ?>"><?php _e( 'Skip to content', 'galerie_flak' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
	
		
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main">