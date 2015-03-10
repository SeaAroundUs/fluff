<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>

<div id="content-wrap">
<div id="content">
<div class="gap archives">
 <div class="xxpost">
   <h2 class="pagetitle">Journal Archive</h2>
<p class="info">Welcome to Arhive Page, I hope you will find what you are looking for.</p>

 
<div class="pust"><?php wp_get_archives('type=postbypost&limit=20&format=custom&before=<div class="pist">&after=</div>'); ?></div>

<?php if(function_exists('wp_tag_cloud')) { ?>
  <div class="categr">
  <h2>Archive by Tags:</h2>
	<?php wp_tag_cloud(''); ?>
  </div>
	<?php } ?>
	<?php if(function_exists('category_cloud')) { ?>
  <div class="categr">
  <h2>Archive by Category:</h2>
  <?php category_cloud(); ?>
  </div>
	<?php } ?>
  <div class="monthr">
  <h2>Archive by Month:</h2>
  <ul class="nones">
    <?php wp_get_archives('show_post_count=true') ?>
	</ul>
	
	
</div>
</div>
</div> <!-- /gap -->
</div> <!-- /content -->
</div> <!-- /content-wrap -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
