<div id="recentpost">	
	<div id="recentposttitle"><h3>Recent Posts</h3></div>
	<ul>
    <?php query_posts('showposts=4&offset=1'); ?>

    <?php while (have_posts()) : the_post(); ?>
    <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
	<?php the_title(); ?></a></li>
    <?php endwhile; ?>
	
	</ul>
</div>