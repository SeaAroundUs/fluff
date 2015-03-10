<?php get_header(); ?>

<div id="content-wrap">
	<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<?php
		 $counter = 0; $counter2 = 0;
		while (have_posts()) : the_post(); 
		 $counter++; $counter2++;  
		 ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
<div class="<?php if ($counter == 1) { echo 'leftside'; } else { echo 'rightside'; $counter = 0; } ?>">
<div class="atas-post"><?php the_time('F jS, Y') ?> - <?php the_time() ?> <!-- &sect; <?php _e('by'); ?> <?php the_author() ?>  -->&sect; in  <?php the_category(', ') ?></div>
<?php 
$key="thumbnail";
if(get_post_meta($post->ID, $key, true)):
	$inis = get_post_meta($post->ID, $key, true);
else:
	$inis = catch_that_image();
endif; 

if(!empty($inis)): ?> 
<div class="theimage pik" style="background: url(<?php echo $inis; ?>) center top no-repeat; width: 150px; height:110px; border: 1px solid #777;"></div>
<?php endif; ?><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">
					<p><?php
						$texter = get_the_excerpt();
						if(strlen($texter ) > 300) {
						$texter = substr($texter , 0, 300);
						}
						echo ''.$texter.'[...]'; 
						?>
						</p>				</div>

				<div class="postmetadata"><span class="lefter"><?php the_tags('Tags: ', ', ', ''); ?></span> <span class="righter"><?php edit_post_link('Edit', '', '  '); ?>  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></div>
			</div>
</div>
		<?php endwhile; ?>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
      <div class="navigation">
        <div class="alignleft">
          <?php next_posts_link('&larr; Previous Entries') ?>
        </div>
        <div class="alignright">
          <?php previous_posts_link('Next Entries &rarr;') ?>
        </div>
      </div>
      <?php } ?>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>