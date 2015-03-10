<div id="sidebar">


<!--BEGIN 'MORE FROM THIS CATEGORY'-->		
	


<!--END-->




<!--BEGIN SUBPAGE MENU-->

<?php if (is_page()) { ?>
<?php include_once (TEMPLATEPATH . "/childnav.php"); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php if ($children) { ?>  
					<h3><?php _e('In this section:','Mimbo'); ?></h3>
					
					<ul class="subpages">
					<?php if ($section_overview) {echo $section_overview;} ?>
					<?php echo $children; ?>
					</ul>
				<?php } ?>
				
	<?php endwhile; ?>
	<?php endif; ?>
<?php } ;?>

<!--END SUBPAGE MENU-->



<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Mimbo Sidebar') ) : ?><?php endif; ?>
 		

</div><!--END SIDEBAR-->