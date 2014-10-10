<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package galerie_flak
 * @since galerie_flak 1.0
 */

get_header(); ?>

<?php $currentLang = qtrans_getLanguage(); ?>

		<div id="primary" class="content-area">
			
			<div class="raya"></div>
			
			<div id="content" class="index" role="main">
				
			<h1><?php echo __("<!--:fr-->Arts primitifs<!--:--><!--:en-->Tribal Art<!--:-->"); ?></h1>
			<h2><?php echo __("<!--:fr-->Afrique, océanie, Amériques<!--:--><!--:en-->Africa, Oceania, Americas<!--:-->"); ?></h2>

			<?php if ( have_posts() ) : ?>

				<?php 
					$args = array(
						'post_type' 	=> 'page',
						'page_id' 		=> '4084',	//Live
						//'page_id' 		=> '2306',	//Local		
					);

			        $vignette = new WP_Query($args);
				?>

				<?php while ($vignette->have_posts()) : $vignette->the_post(); ?>	
										
					<?php //on decide si il aurait un image d'un expo ou le carousel aleaoire par default ?>
					<?php if( get_field('home') ) : ?>	
			
						<div class="slider">
							<div class="text-principal-index">
								<a href="<?php the_field('expo_en_cours_link_'.$currentLang.''); ?>" >
									<?php the_content();?>
								</a>
							</div>
		
							<div class="image-principal-index">
								<?php //on verifie une image associé
									if(has_post_thumbnail()) { 
										$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
								?>
										<a href="<?php the_field('expo_en_cours_link_'.$currentLang.''); ?>" >
											<?php echo '<img src="' . $image_src[0]  . '" width="100%"  />'; ?>
										</a>
								<?php } ?>
							</div>	
						</div>
				
					<?php // sinon, on appelle le slider par default ?>
					<?php else : ?>
					
						<div class="module-slider-home clearfix">
							<?php get_template_part( 'inc/slider' );  ?>
						</div>
						
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
					
			<div class="info-index clearfix">
				<div class="adresse">
					<div class="img-footer-index">
						<img src="<?php bloginfo('template_directory'); ?>/img/logo-petit.png" alt="Galerie Flak">
					</div>
					
					<p><?php echo __("<!--:fr-->	8 rue des Beaux-Arts 75006 Paris France<br/>
							tél: (+ 33) 1 46 33 77 77 <br/> 
							fax: (+ 33) 1 46 33 27 57<br/>
							e-mail: <a href='mailto:contact@galerieflak.com'>contact@galerieflak.com</a><!--:-->
						<!--:en-->8 rue des Beaux-Arts 75006 Paris France<br/>
							tel: (+ 33) 1 46 33 77 77 <br/> 
							fax: (+ 33) 1 46 33 27 57<br/>
							e-mail: <a href='mailto:contact@galerieflak.com'>contact@galerieflak.com</a><!--:-->"); 
						?>
					</p>
				</div>
				
				<div class="cecoa">
					<div class="img-footer-index">
						<img src="<?php bloginfo('template_directory'); ?>/img/cecoa.png" alt="C.e.c.o.a">
					</div>
					
					
					<p><?php echo __("<!--:fr-->Julien Flak est expert agréé auprès de la Chambre Européenne des Experts Conseil en Oeuvres d'Art (C.E.C.O.A.)<!--:--><!--:en-->Julien Flak is a certified expert of C.E.C.O.A. (the European Chamber of Expert-Advisors in Fine Art)<!--:-->"); ?>	
					</p>
				</div>
			</div>
			
			<div class="module-slider-footer">
				<div class="interieur gauche">
					<?php get_search_form(); ?>
				</div>
			</div>			

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>