<?php get_header(); ?>

	<div id="content">
	
	<br />	
	<img src="<?php bloginfo('template_url'); ?>/images/banner-page.jpg" border=0 alt="Banner" />
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<div class="singlepage"><?php the_title(); ?></div>
			<div class="entry">
				<?php the_content('<p class="serif">Read more &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
			<?php the_tags(__('Tags: '), ', ', ' '); ?>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>