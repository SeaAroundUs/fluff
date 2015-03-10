<div id="latestbar">
   <?php 
// this is where the Lead Story module begins   
   query_posts('showposts=1'); ?>
    <?php while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"></a>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="title">	
    <?php 
// this is where the title of the Lead Story gets printed	  
	the_title(); ?>
    </a>		    <div id="write_by">    <img src="<?php bloginfo('template_url'); ?>/images/shape_move.gif" alt="This is my site" />	    <small><font color=#999999>Written by</font> <?php the_author() ?> <font color=#999999>on</font> <abbr title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php unset($previousday); printf(__('%1$s &#8211; %2$s'), the_date('', '', '', false), get_the_time()) ?></abbr>	</small>	</div>
    <?php 
// this is where the excerpt of the Lead Story gets printed	  
	the_excerpt(); ?>
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">More &raquo;</a>
    <?php endwhile; ?>
</div><!--END FEATURE-->