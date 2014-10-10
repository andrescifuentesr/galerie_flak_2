<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package galerie_flak
 * @since galerie_flak 1.0
 */

get_header(); ?>

		<section id="primary" class="content-area">
				
			<div class="raya"></div>
			
			<div id="content" class="site-content" role="main">			

			<?php if ( have_posts() ) : ?>

				<header class="page-search">
					<h1 class="page-title"><?php printf( '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>
				
				<div class="module-slider-footer">
					<div class="interieur gauche">
						<?php get_search_form(); ?>
					</div>
				</div>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'search' ); ?>

			<?php endif; ?>
			
			<?php wp_pagenavi(); ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php get_footer(); ?>