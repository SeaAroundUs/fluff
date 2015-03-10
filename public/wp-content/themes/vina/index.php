<?php
get_header(); ?>

<div id="content-wrap">
	<div id="content">

<?php if ( $paged < 2 ) {  // Do stuff specific to first page  ?>
	
	<?php if (have_posts()) : ?> 
      <?php 
$sticky=get_option('sticky_posts');
$args=array(
   'caller_get_posts'=>1,
   'post__not_in' => $sticky,
   'posts_per_page'=>1,
   );
      $my_query = new WP_Query($args);
  while ($my_query->have_posts()) : $my_query->the_post();
  $do_not_duplicate = $post->ID;?>
      <div class="xxxpost lastlast" id="post-<?php the_ID(); ?>">
<?php $key="thumbnail";
if(get_post_meta($post->ID, $key, true)):
	$inis = get_post_meta($post->ID, $key, true);
else:
	$inis = catch_that_image();
endif; 

if(!empty($inis)): ?>  
<div class="lastimage pik" style="background: url(<?php echo $inis; ?>) center top no-repeat; width: 250px; height:200px; border: 1px solid #777;">
</div>

<?php endif; ?>
<div class="atas-post"><?php the_time('F jS, Y') ?> - <?php the_time() ?> <!-- &sect; <?php _e('by'); ?> <?php the_author() ?>  --> &sect; in  <?php the_category(', ') ?></div>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>



				<div class="entry">
					<?php 
$content = get_the_content('read more');
$content = apply_filters('the_content', $content);          
$content = preg_replace('|<img (.+?)>|i', '', $content);
$content = preg_replace('|<div id="attachment_(.+?)" class="wp-caption(.+?)<\/div>|i', '', $content);
echo $content;      ?>
				</div>

				<div class="postmetadata"><span class="lefter"><?php the_tags('Tags: ', ', ', ''); ?></span> <span class="righter"><?php edit_post_link('Edit', '', '  '); ?>  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></div>
</div>


      <?php endwhile; ?>
<br class="clear" />
<?php 
 $counter = 0; $counter2 = 0;
$args=array(
   'caller_get_posts'=>1,
   'post__not_in' => $sticky,
   'paged'=>$paged,
   'posts_per_page'=>7,
   );
query_posts($args);
while (have_posts()) : the_post(); 
  if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); 

 $counter++; $counter2++;  
  ?>  
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="<?php if ($counter == 1) { echo 'leftside'; } else { echo 'rightside'; $counter = 0; } ?>">
<div class="atas-post"><?php the_time('F jS, Y') ?> - <?php the_time() ?> <!-- &sect; <?php _e('by'); ?> <?php the_author() ?>  -->&sect; in  <?php the_category(', ') ?></div>

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<?php 
$key="thumbnail";
if(get_post_meta($post->ID, $key, true)):
	$inis = get_post_meta($post->ID, $key, true);
else:
	$inis = catch_that_image();
endif; 

if(!empty($inis)): ?> 
<div class="theimage pik" style="background: url(<?php echo $inis; ?>) center top no-repeat; width: 150px; height:110px; border: 1px solid #777;"></div>
<?php endif; ?>

				<div class="entry">
					<p><?php
						$texter = get_the_excerpt();
						if(strlen($texter ) > 300) {
						$texter = substr($texter , 0, 300);
						}
						echo ''.$texter.'[...]'; 
						?>
						</p>
				</div>

				<div class="postmetadata"><span class="lefter"><?php the_tags('Tags: ', ', ', ''); ?></span> <span class="righter"><?php edit_post_link('Edit', '', '  '); ?>  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></div>
			
			</div>

<br class="clear" />			</div>

		<?php endwhile; ?>
<br class="clear" />

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

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>
<?php } else { // Do stuff specific to non-first page ?>
<?php
 $counter = 0; $counter2 = 0;
$args=array(
   'caller_get_posts'=>1,
   'post__not_in' => $sticky,
   'paged'=>$paged,
   'posts_per_page'=>6,
   );
query_posts($args);
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
<?php endif; ?>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">
					<p><?php
						$texter = get_the_excerpt();
						if(strlen($texter ) > 300) {
						$texter = substr($texter , 0, 300);
						}
						echo ''.$texter.'[...]'; 
						?>
						</p>
				</div>

				<div class="postmetadata"><span class="lefter"><?php the_tags('Tags: ', ', ', ''); ?></span> <span class="righter"><?php edit_post_link('Edit', '', '  '); ?>  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></div>
			</div>
			</div>


		<?php endwhile; ?>
<br class="clear" />

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


<?php } ?>
	</div>
</div>

<br class="clear" />

<?php get_sidebar(); ?>

<?php get_footer(); ?>
