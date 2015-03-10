<?php
/**
 * Template Name: Front Page Custom
 *
 * @package Sela
 */

get_header(); ?>
<?php the_post(); ?>
<div class="no-img-margin no-h1">
    <?php get_template_part( 'content', 'page' ); ?>
</div>
<?php get_sidebar( 'front-page' ); ?>
<?php get_sidebar( 'footer' ); ?>
<?php get_footer(); ?>