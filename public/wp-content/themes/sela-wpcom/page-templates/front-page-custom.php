<?php
/**
 * Template Name: Front Page Custom
 *
 * @package Sela
 */

get_header(); ?>
<?php the_post(); ?>
<?php get_template_part( 'content', 'page' ); ?>
<?php get_sidebar( 'front-page' ); ?>
<?php get_sidebar( 'footer' ); ?>
<?php get_footer(); ?>