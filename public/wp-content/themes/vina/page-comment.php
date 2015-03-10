<?php
/*
Template Name: Page Comment
*/
?>
<?php
get_header(); ?>

<div id="content-wrap">
	<div id="content">

<div class="dp60">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="xxpost" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

</div>

<div class="dp40">

	<?php comments_template('', true); ?>

</div>

	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>