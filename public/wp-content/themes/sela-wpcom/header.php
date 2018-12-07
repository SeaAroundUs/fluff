<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Sela
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- opengraph (facebook) meta -->
<!-- BEGIN DEL SORTIZ 11-23-17  -->
<!--<meta property="og:title" content="Sea Around Us | Fisheries, Ecosystems and Biodiversity" />
<meta property="og:description" content="The Sea Around Us Project investigates the impact of fisheries on the world&#039;s marine ecosystems. This is achieved by using a Geographic Information System" />
<meta property="og:image" content="http://www.seaaroundus.org/wp-content/uploads/2015/05/HeroImage1.jpg" />-->

<!-- twitter card meta -->
<!--<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@seaaroundus">
<meta name="twitter:title" content="Sea Around Us">
<meta name="twitter:description" content="The Sea Around Us Project investigates the impact of fisheries on the world&#039;s marine ecosystems. This is achieved by using a Geographic Information System">
<meta name="twitter:image" content="http://www.seaaroundus.org/wp-content/uploads/2015/05/HeroImage1.jpg">-->
<!-- END DEL SORTIZ 11-23-17  -->
	
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_enqueue_script("jquery"); ?>

<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/overrides.css" type="text/css" media="all" />
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Roboto:400,500,700' type='text/css' media="all" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/readmore.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<a class="skip-link screen-reader-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'sela' ); ?>"><?php _e( 'Skip to content', 'sela' ); ?></a>

		<div class="site-branding">
            <a href="/">
                <img class="left" src="/wp-content/uploads/2015/03/LogoSeaAroundUs.png" />
                <img class="right" src="/wp-content/uploads/2018/12/UBC_crest.png" />

            </a>

			<?php if ($_SERVER['REQUEST_URI'] == '/gapi/') {?>
			<a href="http://www.gapi.ca/" target="_blank">
				<img class="right" src="/wp-content/uploads/2015/04/logo_gapi.png" />
			</a>
			<?php } ?>

		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'sela' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?> <!-- This part came with the SELA theme and is cool because the highlights will work. -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
