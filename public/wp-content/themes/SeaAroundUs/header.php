<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php dynamictitles(); ?></title>

<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- <meta name="description" content="<?php the_excerpt_rss(); ?>" /> -->
<?php endwhile; endif; elseif(is_home()) : ?>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php endif; ?>

<?php if(is_search()) { ?>
<meta name="robots" content="noindex, nofollow" /> 
<?php }?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/print.css" type="text/css" media="print" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="shortcut icon" href="http://www.seaaroundus.org/about/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://www.seaaroundus.org/about/favicon.ico" type="image/x-icon">

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/dropdowns.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/util-functions.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/saup-functions.js"></script> 

<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); // support for comment threading ?>

<?php wp_head(); ?>

</head>


<body <?php if (is_home()) { ?>id="home" <?php } ?>class="<?php bodystyle(); ?>">





<div id="page">

<!-- START MASTHEAD -->
<div id="container">
        <div class="header">
            <div>
                <a id="ctl00_hlHeaderHome" href="http://www.seaaroundus.org/"><img id="ctl00_imgLogo" alt="Sea Around Us" src="http://www.seaaroundus.org/sf_images/v2/logo_saup_internal.png" style="border-width:0px;float: left" /></a>
            </div>
            <div style="text-align: right; height:85px;">
            <a id="ctl00_SponsorLogo1_hlSponsor" href="http://www.pewtrusts.org/"><img id="ctl00_SponsorLogo1_imgSponsor" src="http://www.seaaroundus.org/sf_images/v2/logo_pew.png" alt="PEW Trusts" style="border-width:0px;" /></a>
        </div>
        </div>
         <div class="GlobalMenu">
        <table class="GlobalMenu">
			<tr>
                <td class="GlobalMenu"><a id="ctl00_hlMenuHome" href="http://www.seaaroundus.org/">HOME</a></td>
                <td class="GlobalMenu"><a id="ctl00_hlDataPage" href="http://www.seaaroundus.org/data/">ANALYSES AND VISUALIZATION</a></td>
                <td class="GlobalMenu"><a href="http://www.seaaroundus.org/about/index.php/articles/">PUBLICATIONS</a></td>
                <td class="GlobalMenu"><a class="GlobalMenuSelected" href="http://www.seaaroundus.org/about/">NEWS AND ABOUT</a></td>
                <td class="GlobalMenu"><a id="ctl00_hlCollaborations" href="http://www.seaaroundus.org/collaboration/">COLLABORATIONS</a></td>
                <td class="GlobalMenu"><a id="ctl00_hlContact" href="http://www.seaaroundus.org/help/contact.aspx">CONTACT US</a></td>
            </tr>
        </table>
    </div>
</div>

<!--END MASTHEAD-->



<!-- dark blue menu bar -->
<div id="wrapper" class="clearfloat">
<ul id="nav-cat" class="clearfloat">
<li class="cat-item"><a href="/projects/about">News & About Home</a> <!--added by S.Wiswedel-->
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

<div id="navsearch">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<input type="text" value="Search News and Events" class="cleardefault" name="s" id="s" /><input type="image" src="<?php bloginfo('template_url'); ?>/images/magnify.gif" id="searchsubmit" />
</form>
</div>
</ul>