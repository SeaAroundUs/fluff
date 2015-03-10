<?php get_header(); ?>


<div id="content-wrap">
<div id="content">
<div class="gap">

<div class="dp60">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="xpost" id="post-<?php the_ID(); ?>">
    <h2 class="single"><?php the_title(); ?></h2>
    
    <div class="entry">
      <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </div>
<p class="postmetadata">
  <?php the_tags('Tags: ', ', ', '<br />'); ?> 
	  <span class="authr">
      Posted <span class="date"><?php the_time('d M Y') ?></span> by <?php the_author() ?></span>
      in <?php the_category(', ') ?>
      <?php edit_post_link('Edit', '<span class="editr">', '</span>'); ?>
</p>
</div>


  <div class="navigation">
    <div class="alignleft">
      <?php previous_post_link('&larr; %link') ?>
    </div>
    <div class="alignright">
      <?php next_post_link('%link &rarr;') ?>
    </div>
  </div>
  <br class="clear" />
</div>
<div class="dp40">

	<?php comments_template('', true); ?>

</div>
 <?php endwhile; else: ?>
  <p>Sorry, no posts matched your criteria.</p>
  <?php endif; ?>

  <br class="clear" />

</div> <!-- /gap -->
</div> <!-- /content -->
</div> <!-- /content-wrap -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
