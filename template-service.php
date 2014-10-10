<?php
/*
Template Name: Services
*/

get_header(); ?>
<?php $currentLang = qtrans_getLanguage(); ?>

		<div id="primary" class="content-area clearfix">
			
			<div class="raya"></div>
			
			<div id="content" class="site-content" role="main">
				
			<h1><?php the_title(); ?></h1>

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="info-services gauche">
							<p><?php the_field('services-gauche_'.$currentLang.''); ?></p>
						</div><!-- .entry-content -->
					
						<div class="info-services droite">
							<div class="cecoa">
								<?=the_post_thumbnail(array(auto,auto));?>
								<p><?php the_field('services-droite_'.$currentLang.''); ?></p>
							</div>
						</div>
					
					</article><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>