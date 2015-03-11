<?php

//[grid link="link" image="image" title="title"]content[/grid]
add_shortcode('grid', function($attrs, $content = "CONTENT HERE") {
    $collaboratorTemplate = <<<EOT
<article class="grid">
  <!-- thumbnail -->
  <div><a href="%s" target="_blank">
    <img src="%s" alt="%s" />
  </a></div>
  <!-- header -->
  <h2><a href="%s">%s</a></h2>
  <!-- text -->
  <p>%s</p>
</article>
EOT;
    $defaults = array(
        'link' => 'LINK HREF HERE',
        'image' => 'IMAGE LINK HERE',
        'title' => 'TITLE TEXT HERE'
    );
    $attrs = shortcode_atts($defaults, $attrs);
    return sprintf(
        $collaboratorTemplate,
        $attrs['link'],
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