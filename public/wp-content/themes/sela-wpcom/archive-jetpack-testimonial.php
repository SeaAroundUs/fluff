<?php
/**
 * The template for displaying the Testimonials archive page.
 *
 * @package Sela
 */

get_header(); ?>

	<?php $jetpack_options = get_theme_mod( 'jetpack_testimonials' ); ?>

	<?php if ( '' != $jetpack_options['featured-image'] ) : ?>
		<div class="entry-thumbnail">
			<?php echo wp_get_attachment_image( (int)$jetpack_options['featured-image'], 'sela-page-thumbnail' ); ?>
		</div><!-- .thumbnail -->
	<?php endif; ?>

	<div class="content-wrapper full-width <?php echo sela_additional_class(); ?>">
		<div id="primary" class="content-area testimonials-content-area">
			<div id="content" class="site-main" role="main">

				<article class="hentry">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php
							if ( '' != $jetpack_options['page-title'] )
								echo esc_html( $jetpack_options['page-title'] );
							else
								_e( 'Testimonials', 'sela' );
							?>
						</h1>
					</header><!-- .entry-header -->

					<?php sela_jp_testimonials_content(); ?>
				</article><!-- .hentry -->

				<div id="testimonials" class="testimonials grid">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'testimonial' ); ?>
						<?php endwhile; ?>

						<?php sela_content_nav( 'nav-below' ); ?>
					<?php else : ?>
						<?php get_template_part( 'no-results', 'testimonial' ); ?>
					<?php endif; ?>
				</div><!-- .testimonials .grid -->

			</div><!-- #content -->
		</div><!-- #primary -->
	</div>

<?php get_footer(); ?>
