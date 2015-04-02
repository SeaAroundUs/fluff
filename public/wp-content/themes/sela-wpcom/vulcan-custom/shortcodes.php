<?php

//[grid link="link" image="image" title="title"]content[/grid]
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
    session_start();

    $token = md5('tuna' . uniqid(rand(), true));
    $_SESSION['xrsf'] = $token;
    return $token;
});

//[feedback-form-submit email="email" from="from"]
add_shortcode('feedback-form-submit', function() {
    session_start();

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
        wp_die(__('Invalid Token'), 403);
    } else {
        $_SESSION['xrsf'] = '';
    }

    // validate & process form
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($comments) > 0) {
        //TODO email here
        return "<p>{$email} RE: {$page}<br />{$comments}</p>";
    } else {
        return '<p class="invalid">Invalid feedback, try again</p>';
    }
});
