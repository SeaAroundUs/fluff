<?php get_header(); ?>

	<div id="content">
	
	<br />	
	<img src="<?php bloginfo('template_url'); ?>/images/banner-page.jpg" border=0 alt="Banner" />

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="singlepage"><?php the_title(); ?></div>	
				<img src="<?php bloginfo('template_url'); ?>/images/mini-comments.gif" alt="This is my site" />			
				<small><font color="#999999">Written by</font> <?php the_author() ?> <font color="#999999">on</font> <abbr title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s &#8211; %2$s'), the_date('', '', '', false), get_the_time()) ?></abbr></small>			
				
				<div class="entry">
				<?php the_content('<p class="serif">Read more &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
		  </div>
	
	<div id="singlepostwrapper">	
	<div id="singlepostin">Posted in &nbsp;</div> <div id="singlecat"><?php the_category() ?><br /><?php the_tags(__('Tags: '), ', ', ' '); ?></div>
	</div>
		
	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
