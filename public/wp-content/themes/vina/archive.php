<?php
get_header();
?>

<div id="content-wrap">
<div id="content">
<div class="gap">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php } ?>

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
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>

	</div>
	</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
