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
  <h3><a href="%s">%s</a></h2>
  <!-- text -->
  <p>%s</p>
</article>
EOT;
    $defaults = array(
        'link' => 'LINK HREF HERE',
        'image' => 'IMAGE LINK HERE',
        'title' => 'TITLE TEXT HERE',
        'target' => '_blank'
    );
    $attrs = shortcode_atts($defaults, $attrs);
    return sprintf(
        $gridTemplate,
        $attrs['link'],
        $attrs['target'],
        $attrs['image'],
        $attrs['title'],
        $attrs['link'],
        $attrs['title'],
        $content
    );
});

//[clear]
add_shortcode('clear', function() {
    return '<div class="clear"></div>';
});
