<br class="clear" />
<div id="sidebar">

<div class="dp50">
		<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> 

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p class="infonesia boxr">You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p class="infonesia boxr">You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for the day <?php the_time('l, F jS, Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p class="infonesia boxr">You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for <?php the_time('F, Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p class="infonesia boxr">You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for the year <?php the_time('Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p class="infonesia boxr">You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p class="infonesia boxr">You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives.</p>

			<?php } ?>

<?php }?>


<div class="tagtag">
<?php wp_tag_cloud(); ?>
</div>

<?php if(function_exists('get_flickrRSS')): ?>
   <div class="flickr clearfix">
    <ul>
      <?php get_flickrRSS(); ?>
    </ul>
<br class="clear" />
    </div>
<?php endif; ?>






<div class="dp50">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Left') ) : else : ?>
<?php J_ShowRecentPosts(); ?>
<?php endif; ?>
</ul>

</div>
<div class="dp50">        
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Center Left') ) : else : ?>
        <li class="boxr">
<h3>Archives</h3>
<ul>
<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
</ul>

        </li>

<?php endif; ?>
</ul>
</div>
</div>

<div class="dp50">
<div class="dp50">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Center Right')) : else : ?>
<?php if (function_exists('get_recent_comments')) { ?>
        <li class="boxr">
          <h3><span><?php _e('Recent Comment'); ?></span></h3>
          <ul>
            <?php get_recent_comments(); ?>
          </ul>
        </li>
        <?php } ?>
<?php if (function_exists('akpc_most_popular')) { ?>
<li class="tmost boxr">
        <h3><span>Most Popular</span></h3>
<ul>
          <?php akpc_most_popular(); ?>
</ul>
</li>
<?php } ?>

				<li class="boxr"><h3>Meta</h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>


<?php endif; ?>
        </ul>
</div>
<div class="dp50 livina">
<div class="grap">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Right')) : else : ?>
            <?php wp_list_bookmarks('show_description=0&orderby=url&class=boxr linkcat'); ?>    

<?php endif; ?>
        </ul>
</div>
</div>
</div>
</div>

<br class="clear" />
