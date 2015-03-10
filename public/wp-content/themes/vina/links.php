<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="content-wrap">
	<div id="content">

<h2 class="poste">Links:</h2>
<ul class="listlink">
<?php wp_list_bookmarks(); ?>
</ul>

	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
