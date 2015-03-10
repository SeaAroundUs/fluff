<div id="sidebar">
	
<?php	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	
	<div class="sideblock">	
	<h3>Latest Posts</h3>
	<ul>
		<?php get_archives('postbypost', '5'); ?>
	</ul>
	<br />
	</div>	

	<div class="sideblock">
	<?php
		global $comment;
		if ( $comments = $wpdb->get_results("SELECT comment_author, comment_author_url, comment_ID, comment_post_ID FROM $wpdb->comments WHERE comment_approved='1' ORDER BY comment_date_gmt
		DESC LIMIT 10") ) :
		?>

		<h3><?php _e('Recent Comments'); ?></h3>
		<ul>
		<?php
		foreach ($comments as $comment) {
		echo '<li>' . sprintf('%s <span style="text-transform: lowercase;">on </span>%s', get_comment_author_link(), '<a href="'. get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '">' . get_the_title($comment->comment_post_ID) . '</a>');
		echo '</li>';
		}
		?>
		</ul>
		<br />
	<?php endif; ?>
	</div>
	
	<div class="sideblock">
	<h3>Browse Archives</h3>
	<form id="archiveform" action="">
	<div id="browse-select">
	<select name="archive_chrono" onchange="window.location = 
	(document.forms.archiveform.archive_chrono[document.forms.archiveform.archive_chrono.selectedIndex].value);">
	<?php get_archives('monthly','','option'); ?>
	</select>
	</div>
	</form>
	<br />
	</div>	
		
	<div class="sideblock">	
	<h3>Browse Categories</h3>
	<ul>
	<?php wp_list_categories('title_li='); ?>
	</ul>
	<br />
	</div>
	
	<div class="sideblock">
	<h3>Subscribe</h3>
	<ul>
	<li><a href="<?php bloginfo('rss2_url'); ?>">Posts RSS</a></li>
	<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments RSS</a></li>			
	</ul>
	<br />
	</div>

	<div class="sideblock">
	<h3>Search</h3>
	<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<div><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="Go" />
	</div>
	</form>
	<br />
	</div>
		 
<?php endif; ?>

</div>