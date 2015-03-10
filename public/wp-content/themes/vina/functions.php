<?php
if(function_exists('automatic_feed_links')): automatic_feed_links(); endif;

// check functions
  if ( function_exists('wp_list_bookmarks') ) //used to check WP 2.1 or not
    $numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post' and post_status = 'publish'");
	else
    $numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
  if (0 < $numposts) $numposts = number_format($numposts); 
	$numcmnts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
		if (0 < $numcmnts) $numcmnts = number_format($numcmnts);
// ----------------
function J_ShowRecentPosts() {?>
<li class="boxr">
  <h3>Recent Post</h3>
  <ul>
    <?php wp_get_archives('type=postbypost&limit=10');?>
  </ul>
</li>
<?php }	

// WIDEGT OPTIONS
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name'=>'Sidebar Left',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle"><span>',
        'after_title' => '</span></h3>'
	));
	register_sidebar(array(
		'name'=>'Sidebar Center Left',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle"><span>',
        'after_title' => '</span></h3>'
	));
	register_sidebar(array(
		'name'=>'Sidebar Center Right',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle"><span>',
        'after_title' => '</span></h3>'
	));
	register_sidebar(array(
		'name'=>'Sidebar Right',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle"><span>',
        'after_title' => '</span></h3>'
	));

}


/* WordPress 2.7 and Later on */
add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) 	$file = TEMPLATEPATH . '/old.comments.php';
	return $file;
}

function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID(); ?>">
  <?php comment_author_link(); ?>
  <span>
  <?php comment_date('d m y'); ?>
  </span>
  <?php } 

function list_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
  <div id="div-comment-<?php comment_ID() ?>" class="thechild">
    <div class="cleft">
      <?php echo get_avatar($comment, 60); ?>
      
      </div>
    <div class="cright"> 
    <div class="comment-author vcard by"> <?php printf('<span class="fn">%s</span>', get_comment_author_link()) ?> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">#</a> </div>
      <div class="comment-meta commentmetadata"><?php printf('%1$s %2$s', get_comment_date('m.d.Y'),  get_comment_time('H:i')) ?>
        <?php edit_comment_link(__('(e)','ndadap'),'  ','') ?>
      </div>
	<span class="numero"><?php global $cmntCnt; ?><?php echo $cmntCnt+1; ?><?php $cmntCnt = $cmntCnt + 1; ?>
</span>
    
      <?php if ($comment->comment_approved == '0') : ?>
      <em>
      <?php _e('Your comment is awaiting moderation.') ?>
      </em> <br />
      <?php endif; ?>
      <div class="texe"><?php comment_text() ?></div>
      <div class="reply">
        <?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
    </div>
<div class="clear"></div>
  </div>
<div class="clear"></div>

</li>
<?php
        }
/**
 * count for Trackback, pingback, comment, pings
 *
 * use it:
 * fb_comment_type_count('ping');
 * fb_comment_type_count('comment');
 */
if ( !function_exists('fb_comment_type_count') ) {
	function fb_get_comment_type_count($type='all', $post_id = 0) {
		global $cjd_comment_count_cache, $id, $post;
 
		if ( !$post_id )
			$post_id = $post->ID;
		if ( !$post_id )
			return;
 
		if ( !isset($cjd_comment_count_cache[$post_id]) ) {
			$p = get_post($post_id);
			$p = array($p);
			update_comment_type_cache($p);
		}
 
		if ( $type == 'pingback' || $type == 'trackback' || $type == 'comment' )
			return $cjd_comment_count_cache[$post_id][$type];
		elseif ( $type == 'pings' )
			return $cjd_comment_count_cache[$post_id]['pingback'] + $cjd_comment_count_cache[$post_id]['trackback'];
		else
			return array_sum((array) $cjd_comment_count_cache[$post_id]);
	}
 
	// comment, trackback, pingback, pings
	function fb_comment_type_count($type = 'all', $post_id = 0) {
		echo fb_get_comment_type_count($type, $post_id);
	}
}

 function update_comment_type_cache(&$queried_posts) {
global $cjd_comment_count_cache, $wpdb;

if ( !$queried_posts )
return $queried_posts;

foreach ( (array) $queried_posts as $post )
if ( !isset($cjd_comment_count_cache[$post->ID]) )
$post_id_list[] = $post->ID;

if ( $post_id_list ) {
$post_id_list = implode(',', $post_id_list);

foreach ( array('','pingback', 'trackback') as $type ) {
$counts = $wpdb->get_results("SELECT ID, COUNT( comment_ID ) AS ccount
FROM $wpdb->posts
LEFT JOIN $wpdb->comments ON ( comment_post_ID = ID AND comment_approved = '1' AND comment_type='$type' )
WHERE post_status = 'publish' AND ID IN ($post_id_list)
GROUP BY ID");

if ( $counts ) {
if ( '' == $type )
$type = 'comment';
foreach ( $counts as $count )
$cjd_comment_count_cache[$count->ID][$type] = $count->ccount;
}
}
}
return $queried_posts;
}

//* HEAD
define('HEADER_IMAGE', '%s/images/header.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 960);
define('HEADER_IMAGE_HEIGHT', 150);
define('HEADER_TEXTCOLOR', 'FFF');

function admin_header_style() { ?>
<style type="text/css">
#headimg, #header {
        background: #333 url(<?php header_image(); ?>) 0 0 no-repeat;
        height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
        position: relative;
}
<?php if ( 'blank' == get_header_textcolor() ) { ?>

#header h1, #headimg h1 {
        display: none;
}

<?php }else{ ?>

#header h1, #headimg h1 {
	font-size: 30px;
	font-family: "Arial Black", arial, sans-serif;
	position: absolute;
	left: 20px;
	top: 10px;
}
#header .description, #headimg #desc {
	position: absolute;
	left: 20px;
	bottom: 50px;
}
<?php } ?>

</style>

<?php }

function header_style() { ?>

<style type="text/css">
#header {
	background: #333 url(<?php header_image(); ?>) 0 0 no-repeat;
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
    width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
    position: relative;
}

<?php if ( 'blank' == get_header_textcolor() ) { ?>

#header h1 {
        display: none;
}

<?php }else{ ?>
#header .logos {
	background: #000;
	color: #ccc;
	margin: 0 auto;
	position: absolute;
	bottom: 0px;
	left: 20px;
	padding: 10px;
	text-align: left;
/*	display: none; */

/* */
	filter:alpha(opacity=80);
	-moz-opacity:0.8;
	-khtml-opacity: 0.8;
	opacity: 0.8;

}
#header h1 {
	font-size: 30px;
}
#header h1  a:link,#header h1  a:visited {
	color: #fff;
}
#header .description {
	position: absolute;
	right: 20px;
	top: 0px;
	padding: 5px 10px;
	color: #222;
	background: #ccc;

/*	display: none; */
	filter:alpha(opacity=80);
	-moz-opacity:0.8;
	-khtml-opacity: 0.8;
	opacity: 0.8;
}
<?php } ?>
</style>

<?php }

if ( function_exists('add_custom_image_header') ) {
  add_custom_image_header('header_style', 'admin_header_style');
} 

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
//    $first_img = bloginfo('template_directory') . "/images/no-image200.jpg";
  }
  return $first_img;
}


// TWEAK to make it compatible with WordPress.org
// Overides default FULL SIZE image size
$GLOBALS['content_width'] = 500;

// Overides default THUMBNAIL image size
function custom_thumbnail_size() {
return 150; // or whatever number of pixels you want
}
add_filter('wp_thumbnail_max_side_length','custom_thumbnail_size');

// Post Attachment image function. Direct link to file. 
function the_post_image($size = 'medium') {
	$id = get_the_ID();
	if ( empty($id) ) {
		trigger_error( __FUNCTION__ . "(): Couldn't get current post ID", E_USER_WARNING);
		return false;
	}
	$images = get_children(array(
		'numberposts' => 1,
		'post_parent' => $id,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
	));
	if ( empty($images) ) {
		// Post has no attached images
		return false;
	}
	$image = array_pop($images);
	$output = wp_get_attachment_image($image->ID, $size);
	if ( empty($output) ) {
		trigger_error( __FUNCTION__ . "(): Couldn't print image for attachment #{$image->ID}", E_USER_WARNING);
		return false;
	}
	echo $output;
}

// Post Attachment image function. Image URL for CSS Background. 
function the_post_image_url($size2 = 'thumbnail') {
	$id2 = get_the_ID();
	if ( empty($id2) ) {
		trigger_error( __FUNCTION__ . "(): Couldn't get current post ID", E_USER_WARNING);
		return false;
	}
	$images2 = get_children(array(
		'numberposts' => 1,
		'post_parent' => $id2,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
	));
	if ( empty($images2) ) {
		// Post has no attached images
//		echo bloginfo('template_directory') . "/images/no-image200.jpg";
		return false;
	}
	$image2 = array_pop($images2);
	$output2 = wp_get_attachment_url($image2->ID, $size2);
	if ( empty($output2) ) {
		trigger_error( __FUNCTION__ . "(): Couldn't print image for attachment #{$image->ID}", E_USER_WARNING);
		return false;
	}
	echo $output2;
}

//Theme Options Page
/* Will be implemented in Future Released 
 include_once(TEMPLATEPATH . '/inc/theme-options.php'); */

?>