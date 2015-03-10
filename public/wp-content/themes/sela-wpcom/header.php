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
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- KSB added these to match the SeaAroundUs theme header page -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/dropdowns.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/util-functions.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/saup-functions.js"></script>

<?php wp_enqueue_script("jquery"); ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	

	<header id="masthead" class="site-header" role="banner">
		<a class="skip-link screen-reader-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'sela' ); ?>"><?php _e( 'Skip to content', 'sela' ); ?></a>

		<div class="site-branding">
			<?php sela_the_site_logo(); ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php if ( '' != get_bloginfo( 'description' ) ) : ?>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>
		</div><!-- .site-branding -->
		
		<!-- KSB start the Global Navigation panel -->
		<div class="GlobalMenu_vulcan">
			<table class="GlobalMenu_vulcan">
				<tr>
					<td><a id="ctl00_hlMenuHome" href="http://www.seaaroundus.org/">HOME</a></td>
					<td><a id="ctl00_hlDataPage" href="http://www.seaaroundus.org/data/">ANALYSES &amp; VISUALIZATION</a></td>
					<td><a href="http://www.seaaroundus.org/about/index.php/articles/">PUBLICATIONS</a></td>
					<td><a class="GlobalMenuSelected current-menu-ancestor" href="http://www.seaaroundus.org/about/">NEWS &amp; ABOUT</a></td>
					<td><a id="ctl00_hlCollaborations" href="http://www.seaaroundus.org/collaboration/">COLLABORATIONS</a></td>
					<td><a id="ctl00_hlContact" href="http://www.seaaroundus.org/help/contact.aspx">CONTACT US</a></td>
				</tr>
			</table>
		</div>
		<!-- KSB end the Global Navigation panel -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'sela' ); ?></button>
			<!-- KSB - START the nav links -->
			<!-- ?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ? --> <!-- This part came with the SELA theme and is cool because the highlights will work. -->
			<!-- wp_list_categories does "New & Notable", "Events", "New Research" -->
			<!-- ?php wp_list_categories('title_li&orderby=name&order=desc&include=9,30,31'); ? -->
			
			<div id="wrapper" class="clearfloat">
				<ul id="nav-cat" class="clearfloat">
					<li class="cat-item"><a href="/projects/about">News &amp; About Home</a> <!--added by S.Wiswedel-->
					<?php wp_list_categories('title_li&orderby=name&order=desc&include=9,30,31'); ?>
					<li class="cat-item"><a href="#">Publications</a>
					<ul class="children">
					<?php wp_list_pages('title_li=&include=821,814,803,762,809,825,2395'); ?>
					</ul></li>
					<?php wp_list_categories('include=5,21,15,20,6,14,13,16&title_li='); ?>
					<li class="cat-item"><a href="#">Media Coverage</a>
					<ul class="children">
					<?php wp_list_pages('title_li=&include=801,815,816,823,972'); ?>
					</ul></li>
					<li class="cat-item">
					<?php wp_list_pages('include=771&title_li=&orderby=post_title'); ?>
					</li>
					<li>
						<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
							<input type="text" placeholder="  Search News &amp; About" class="cleardefault" name="s" id="s" />
							<input type="image" src="<?php bloginfo('template_url'); ?>/images/magnify.gif" id="searchsubmit" />
						</form>
					</li>
				</ul>
			</div>
			<!-- KSB - END the nav links -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
