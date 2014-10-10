<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package galerie_flak
 * @since galerie_flak 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'galerie_flak' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'galerie_flak' ); ?></p>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<div class="module-search">				
						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'galerie_flak' ); ?></p>
						<div class="module-slider-footer-interieur">
							<div class="interieur gauche">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>

				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

<?php get_footer(); ?>