<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

			<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<img src="<?php bloginfo('template_url'); ?>/images/mini-comments.gif" alt="Icon" />	
				<small>Written by <?php the_author() ?> on <abbr title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s &#8211; %2$s'), the_date('', '', '', false), get_the_time()) ?></abbr>
					</small>
	<div class="entry">
					<?php the_excerpt() ?>
				</div>
				<?php the_tags(__('Tags: '), ', ', ' '); ?>
				<hr /><br />
				
			</div>

		<?php endwhile; ?>
		
		<div class="navigation">
			<?php next_posts_link('&laquo; Older Entries') ?>
			<?php previous_posts_link('Newer Entries &raquo;') ?>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>