<div id="bottombar">
	
	<div id="categoryx">
		
    	<h2 class="bottombartitle"><?php _e('Categories'); ?></h2>
    	<ul class="list-cat">
        	<?php wp_list_categories('orderby=name&number=11&hierarchical=0&title_li='); ?>
      	</ul>
      		
      	<br />
        
	  	<h2 class="bottombartitle">More Categories</h2>
	  	<br />
	  	<?php wp_dropdown_categories('show_option_none=Select category&show_count=1&orderby=name&hierarchical=1'); ?>

		<script type="text/javascript">
		<!--
		    var dropdown = document.getElementById("cat");
		    function onCatChange() {
				if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
					location.href = "<?php echo get_option('home');
		?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
				}
		    }
		    dropdown.onchange = onCatChange;
		-->
		</script>
    </div>
    	
    <div id="archivex">
      <h2 class="bottombartitle"><?php _e('Archives'); ?></h2>
      <ul class="list-archives">
        <?php wp_get_archives('type=monthly&limit=11'); ?>
      </ul>
        
      <br />
        
      <h2 class="bottombartitle">Older</h2>
      <br />	  	  
	  <select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
  		 <option value=""><?php echo attribute_escape(__('Select Month')); ?></option> 
  	  <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
  	 </select>
    </div>
    
    <div id="commentx">	
      <h2 class="bottombartitle"><?php _e('Recent Comments'); ?></h2>
	    <?php
		global $comment;
		if ( $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved='1' ORDER BY comment_date_gmt
		DESC LIMIT 5") ) :
		?>	
			
		<ul class="list-archives">
			<?php
			foreach ($comments as $comment) {
				echo '<li><a href="'. get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '"><font color="#222222">' . sprintf('%s...', substr(strip_tags($comment->comment_content), 0, 80)).'</font><br>'.get_comment_author($comment->comment_post_ID).'</a>';
			echo '</li>';
			}	
			?>
		</ul>
	<?php endif; ?>
	</div>
	
	<div id="blogroll">
      <h2 class="bottombartitle"><?php _e('Links'); ?></h2>
      	  <ul>
      		<?php wp_list_bookmarks('categorize=0&category=2&before=<li>&after=</li>&show_images=1&show_description=0&orderby=url&title_li=&limit=11'); ?>	  
      	  </ul>  
      <br />
        
      <h2 class="bottombartitle">More Links</h2>
      <br />

 	  <select onchange="document.location.href=this.value">
 	 	<option value=""><?php echo attribute_escape(__('Select Links')); ?></option> 
      <?php require_once "dropdown-links.php"; wp_list_bookmarks_dropdown('before=<option&after=</option>'); ?>
      
      </select>
      
    </div>

</div>
<!--/bottombar -->