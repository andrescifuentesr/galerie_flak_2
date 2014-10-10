<?php
/*
Template Name: Info
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

						<div class="module-infos">
							
							<div class="interieur gauche info-galerie-flak">
								<?=the_post_thumbnail(array(auto,auto));?>
								
								<div class="cadre-gris">
									<?php if( get_field('image_galerie') ): ?>
										<img src="<?php the_field('image_galerie'); ?>" alt="Photo Galerie Flak" class="">
									<?php endif; ?>
								</div>
								
								<div class="galerie">
									<h1>
										<?php echo __("<!--:fr-->Galerie Flak<!--:--><!--:en-->Galerie Flak<!--:-->"); ?>
									</h1>
									<p><?php the_field('adresse_'.$currentLang.''); ?></p>
								</div>
							</div>
							
							<div class="interieur droite info-horaires">
								<h1>
									<?php echo __("<!--:fr-->Horaires<!--:--><!--:en-->Opening hours<!--:-->"); ?>
								</h1>
								<?=the_post_thumbnail(array(auto,auto));?>
								<p><?php the_field('horaires_'.$currentLang.''); ?></p>
							</div>
						</div><!-- .entry-content -->
					
						<div class="module-infos">
							<div class="interieur gauche info-galerie">
								<h1>
									<?php echo __("<!--:fr-->La Galerie<!--:--><!--:en-->About the Gallery<!--:-->"); ?>
								</h1>
								<p><?php the_field('la_galerie_'.$currentLang.''); ?></p>
							</div>

							<div class="interieur droite info-acces">
								<h1>
									<?php echo __("<!--:fr-->Accès<!--:--><!--:en-->Access<!--:-->"); ?>
								</h1>
								<p><?php the_field('acces_'.$currentLang.''); ?></p>
								<?=the_post_thumbnail(array(auto,auto));?>
								<img src="<?php bloginfo('template_directory'); ?>/img/map.png" alt="Map d'access" class="info-acces-map">
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