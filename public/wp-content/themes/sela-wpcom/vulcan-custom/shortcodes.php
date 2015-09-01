<?php
session_start();

require_once __DIR__ . '/../vendor/sesClient.php';

// add search to menu
add_filter('wp_nav_menu_items', function($items, $args) {
    if ($args->theme_location == 'primary') {
        $oldStr = 'Job Openings</a></li>';
        $searchForm = get_search_form(false);
        return str_replace($oldStr, "$oldStr<li class=\"menu-item menu-search\">{$searchForm}</li>", $items);
    }
    return $items;
}, 10, 2);

// set search page to be considered under news
add_filter('nav_menu_css_class', function($classes, $item) {
    if (is_search() && $item->title == 'News & About') {
        $classes[] = 'current-menu-item';
    }
    return $classes;
}, 10, 2);

//[grid link="link" image="image" title="title" target="_blank"]content[/grid]
add_shortcode('grid', function($attrs, $content = "CONTENT HERE") {
    $gridTemplate = <<<EOT
<article class="grid">
  <!-- thumbnail -->
  <div><a href="%s" target="%s">
    <img src="%s" alt="%s" />
  </a></div>
  <!-- header -->
  <h3><a href="%s" target="%s">%s</a></h3>
  <!-- text -->
  <p>%s</p>
</article>
EOT;
    $gridTemplateNoLinks = <<<EOT
<article class="grid">
  <!-- thumbnail -->
  <div><img src="%s" alt="%s" /></div>
  <!-- header -->
  <h3>%s</h3>
  <!-- text -->
  <p>%s</p>
</article>
EOT;

    $defaults = array(
        'link' => false,
        'image' => 'IMAGE LINK HERE',
        'title' => 'TITLE TEXT HERE',
        'target' => '_blank'
    );
    $attrs = shortcode_atts($defaults, $attrs);

    if ($attrs['link']) {
        $html = sprintf(
            $gridTemplate,
            $attrs['link'],
            $attrs['target'],
            $attrs['image'],
            $attrs['title'],
            $attrs['link'],
            $attrs['target'],
            $attrs['title'],
            $content
        );
    } else {
        $html = sprintf(
            $gridTemplateNoLinks,
            $attrs['image'],
            $attrs['title'],
            $attrs['title'],
            $content
        );
    }

    return $html;
});

//[clear]
add_shortcode('clear', function() {
    return '<div class="clear"></div>';
});

//[xrsf]
add_shortcode('xrsf', function() {
    $_SESSION['xrsf'] = $_SESSION['xrsf'] ?: md5('tuna' . uniqid(rand(), true));
    return 'value="' . $_SESSION['xrsf'] . '"';
});

//[feedback-form-submit]
add_shortcode('feedback-form-submit', function($attrs) {
    // only on POST
    if (!$_POST) {
        return null;
    }

    // sanitation
    $email = strip_tags($_POST['feedback-email']);
    $comments = strip_tags($_POST['feedback-comments']);
    $page = strip_tags($_POST['feedback-page']);

    // validation
    if ($_POST['feedback-token'] !== $_SESSION['xrsf']) {
        wp_die(__('Invalid token: ' . $_POST['feedback-token'] . '!==' . $_SESSION['xrsf']), 403);
    }

    // validate & process form
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($comments) > 0) {
        $page = "http://www.seaaroundus.org{$page}";
        $body = "<p>Feedback from {$email} for <a href=\"{$page}\">{$page}</a></p><p>{$comments}</p>";

        if (sendSesMail('Sea Around Us Feedback', $body)) {
            $_SESSION['referringURL'] = '';
            $_SESSION['xrsf'] = '';
            $_POST['feedback-email'] = '';
            $_POST['feedback-comments'] = '';

            return '<p class="success">Feedback sent; thank you!</p>';
        } else {
            return '<p class="invalid">Feedback unable to send at this time; please try again later</p>';
        }

    } else {
        return '<p class="invalid">Invalid feedback; please try again</p>';
    }
});

//[referring-url label="false" attr="false"]
add_shortcode('referring-url', function($attrs) {
    $attrs = shortcode_atts(array('label' => '', 'attr' => false), $attrs);

    if (isset($_GET['referringURL'])) {
        $_SESSION['referringURL'] = $_GET['referringURL'];
    }

    if (!isset($_SESSION['referringURL'])) {
        $value = '';
    } else {
        $value = $attrs['label'] . htmlentities(strip_tags($_SESSION['referringURL']));
    }

    return $attrs['attr'] ? 'value="' . $value . '"' : $value;
});

//[old-post field="fieldname" attr="false"]
add_shortcode('old-post', function($attrs) {
    $attrs = shortcode_atts(array('field' => null, 'attr' => false), $attrs);

    if ($attrs['field'] == null) {
        return '';
    }

    $value = isset($_POST, $_POST[$attrs['field']]) ? strip_tags($_POST[$attrs['field']]) : '';

    return $attrs['attr'] ? 'value="' . $value . '"' : $value;
});

