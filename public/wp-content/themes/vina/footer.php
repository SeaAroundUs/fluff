<br class="clearfix clear" />
</div>
<hr />
<div id="footer">
	<p>
		<strong>
    <?php bloginfo('name');?>
    </strong> &copy; <?php echo date('Y'); ?> All Rights Reserved. We Love <a href="http://wordpress.org/">WordPress <?php bloginfo('version');?></a> . 
    <!--<?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>


<p class="right"><span><a href="http://wpgpl.com/themes/vina/" title="Vina WordPress Theme ver 1.3.1">Vina</a> 1.3.1 design by <a href="http://wpgpl.com/">WPGPL</a>
<!-- <br /><span class="rss"><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></span> and <span class="rss"><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></span> -->
  </p>
  
  
</div>
</div>
<script type="text/javascript">
<!-- // <![CDATA[
var $jx = jQuery.noConflict();
$jx(".postes .thethumb").each(function(i) {
	$jx(this).hover(function() {
		$jx(this).children(".the-post").slideDown();
	}, function() {
		$jx(this).children(".the-post").slideUp();
	});
});

$jx("#header").each(function(i) {
	$jx(this).hover(function() {
		$jx(this).children(".logos").slideUp();
		$jx(this).children(".description").slideUp();
	}, function() {
		$jx(this).children(".logos").slideDown();
		$jx(this).children(".description").slideDown();
	});
});


// ]]> -->
</script>
<?php wp_footer(); ?>
</body>
</html>
