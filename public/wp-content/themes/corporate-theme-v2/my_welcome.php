<div id="welcomebar">
	
   <?php 
// this is where the Lead Story module begins   
   query_posts('showposts=1&cat=9');   ?>
    <?php while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
	</a>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="title">
    <?php 
// this is where the title of the Lead Story gets printed	  
	the_title(); ?>
    </a>
    <?php 
// this is where the excerpt of the Lead Story gets printed	  
	the_content(); ?>
    {<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">More&raquo;</a>}
    <?php endwhile; ?>
</div><!--END FEATURE-->