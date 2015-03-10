<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php if ( is_home() ) { ?>
<?php bloginfo('description'); ?>
&nbsp;/&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_search() ) { ?>
Search Results&nbsp;|&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_single() ) { ?>
<?php wp_title(''); ?>
&nbsp;/&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_page() ) { ?>
<?php wp_title(''); ?>
&nbsp;/&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_category() ) { ?>
<?php single_cat_title(); ?>
&nbsp;/&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if ( is_month() ) { ?>
<?php the_time('F'); ?>
&nbsp;/&nbsp;
<?php bloginfo('name'); ?>
<?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?>
<?php bloginfo('name'); ?>
&nbsp;/&nbsp;Tag Archive&nbsp;|&nbsp;
<?php  single_tag_title("", true); } } ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />


<script language="javascript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.equalheights.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<script type="text/javascript">
var $jx = jQuery.noConflict();
$jx(document).ready(function() {
	$jx(".post").equalHeights();
});

jQuery(function(){
jQuery('ul.superfish').superfish();
});

/*
jQuery(document).ready(function(){ 
    jQuery(document).pngFix(); 
})
*/
</script>


<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/box/navi.css" type="text/css" />

</head>
<body <?php if(function_exists('body_class')): body_class(); endif; ?>>
<div id="page">

<div id="top">
<div id="navr">
	  <ul class="menu">
		<li <?php if(is_home()){echo 'class="current_page_item"';}?>><a href="<?php bloginfo('siteurl'); ?>/" title="Home">Home</a></li>
		<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
		<?php wp_register('<li class="admintab">','</li>'); ?>
	  </ul>
	  <br class="clear" />
	</div>
			<div class="cari">
				<?php get_search_form(); ?>
			</div>
			<div class="rsse">
<a rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />RSS</a>			</div>

</div>

<div id="header">
	<div class="logos">
    <h1><a href="<?php echo get_option('home'); ?>/">
      <?php bloginfo('name'); ?>
      </a></h1>
      </div>
    <div class="description">
      <?php bloginfo('description'); ?>
    </div>
</div>

  <!--This controls the categories navigation bar-->
<div id="categories">
<ul class="nav superfish"><?php wp_list_cats("optioncount=0&depth=3&show_count=0&title_li="); ?></ul>
</div>
<!--End category navigation-->

<br class="clear" />