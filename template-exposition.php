<?php
/*
Template Name: Exposition
*/

get_header(); ?>

<?php
	$category = get_the_category();
	$category_id = $category[1]->cat_ID;
	$currentLang = qtrans_getLanguage();
?>

		<div id="primary" class="content-area clearfix" role="main">
			
			<div class="raya"></div>
			
			<div id="content" class="site-content">
				<h1><?php the_title(); ?></h1>
			</div><!-- #content .site-content -->
			
			<?php if ( have_posts() ) : ?>
			
				<div class="module-exposition-a-venir">
			
					<?php
					$args2 = array(
						//'cat'			 => 44,					old one, only à venir
						'cat'			 => 24,					// List la cat = Expositions en ligne
						//'post__in'  => get_option( 'sticky_posts' ),
						'order'			 => 'DESC',				// List in DESC order
						'orderby'        => 'Id',				// List them by order de création
						'showposts'   	 => -1, 					// Show only one
						'post_status'    => null,				// For any post status
					);
			        $expoVenir= new WP_Query();
			        $expoVenir->query($args2);
			        ?>

			        <?php while ($expoVenir->have_posts()) : $expoVenir->the_post(); ?>
				
						<article id="post-<?php the_ID(); ?>" class="exposition clearfix">

							<div class="entry-content">

								<div class="single-content">
									<?php if( get_field('video') ) {  ?>
										<div class="video-exposition-single clearfix">
											<?php the_field('video'); ?>
										</div>

									<?php } else {  ?>

										<div class="image-exposition-single">
											<a href="<?php the_permalink() ?>#ascenseur-collection">
												<?=the_post_thumbnail('full');?>
											</a>
										</div>
									<?php }  ?>

									<div class="contenu-exposition-single">
										<h1 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
										<h3><?php the_field('date_expo_'.$currentLang.''); ?></h3>

										<p class="txt_exposition"><?php the_field('txt_exposition_'.$currentLang.''); ?></p>

										<!-- Boucle pour image/e-catalogue -->
										<?php if( get_field('e-catalogue') ) { ?>

											<div class="contenu-exposition-image">
												<img src="<?php the_field('image-e-catalogue'); ?>" alt="<?php the_title_attribute(); ?>" />
											</div>
											<div style="clear:both"></div>
											<div class="fleche"></div>
											<div class="text-catalogue">
												<a href="<?php the_field('e-catalogue_link_'.$currentLang.''); ?>" title="<?php the_title_attribute(); ?>" class="underline">E-CATALOGUE</a><br/>
												<a href="<?php the_field('e-catalogue_link_'.$currentLang.''); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
											</div>

										<!-- Boucle pour image/e-catalogue  -->
										<?php } ?>	
								
											<a href="<?php the_permalink() ?>#ascenseur-collection" class="fleche-separateur">
												<?php echo __("<!--:fr-->Aperçu de la collection et de l’exposition<!--:--><!--:en-->View the collection and the exhibition<!--:-->"); ?>
											</a>
										<a href="<?php the_permalink() ?>#ascenseur-collection" class="fleche-exposition"></a>
									</div>
								</div>

							</div><!-- .entry-content -->
						</article><!-- #post-<?php the_ID(); ?> -->
					<?php endwhile; // end of the loop. ?>

				</div><!-- #content .site-content -->
			
			<?php endif; ?>
				
			<div class="module-slider-footer">
				<div class="interieur gauche">
					<?php get_search_form(); ?>
				</div>
			</div>					
			
		</div><!-- #primary .content-area -->
<?php get_footer(); ?>