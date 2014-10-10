<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package galerie_flak
 * @since galerie_flak 1.0
 */
?>

<article id="post-0" class="post no-results not-found">
	<header class="page-search">
		<h1 class="page-title">
			<?php echo __("<!--:fr-->Aucun Résultat<!--:--><!--:en-->Nothing Found<!--:-->"); ?>
		</h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'galerie_flak' ), admin_url( 'post-new.php' ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<div class="module-search">				
				<p>
				<?php echo __("<!--:fr-->Désolé mais votre recherche n'a donné aucun résultat. Voulez-vous lancer une nouvelle recherche ?<!--:--><!--:en-->Sorry, your search returned no results. Please try again with different keywords.<!--:-->"); ?>
				</p>
				<div class="module-slider-footer-interieur">
					<div class="interieur gauche">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'galerie_flak' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 .post .no-results .not-found -->
