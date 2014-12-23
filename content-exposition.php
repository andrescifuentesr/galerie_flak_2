<?php
/**
 * @package galerie_flak
 * @since galerie_flak 1.0
 */
?>

<?php
	$category = get_the_category();

	$category_principal = $category[0]->cat_ID;
	if ($category_principal  == 24) {
		$category_id = $category[1]->cat_ID;	
	} else {
		$category_id = $category_principal;	
	}

	$currentLang = qtrans_getLanguage();
?>

<article id="post-<?php the_ID(); ?>" class="exposition">

	<div class="entry-content">
			
		<div class="single-content">
			
			<?php if( get_field('video') ) {  ?>
				<div class="video-exposition-single clearfix">
					<?php the_field('video'); ?>
				</div>
				
			<?php } else {  ?>
		
				<div class="image-exposition-single">
					<?php the_post_thumbnail('full');?>
				</div>
			<?php }  ?>
			
			<div class="contenu-exposition-single">
				<h1 class="entry-title"><?php the_title(); ?></h1>
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
				
				<div class="view-collection">
					<a href="#ascenseur-collection" class="fleche-separateur">	
						<?php echo __("<!--:fr-->Aperçu de la collection et de l’exposition<!--:--><!--:en-->View the collection and the exhibition<!--:-->"); ?>
					</a>
					<a href="#ascenseur-collection" class="fleche-exposition"></a>
				</div>
			</div>
		</div>
		
		<div style="clear:both"></div>
		
		<!-- Boucle pour le slider de la collection  -->
		<?php if( get_field('collection') ) { ?>
		
			<h2>
				<?php echo __("<!--:fr-->Aperçu de la collection<!--:--><!--:en-->View the collection<!--:-->"); ?>
			</h2>
		
			<div class="module-slider loading">
				<div class="flexslider carousel flexslider-expo">
					<ul class="slides">
						<?php
			
						$args = array(
						
							'category__not_in' => array( 24 ), 		//on exclude les post de la cat = exposition
							'category__in' => $category_id,			//on include les post de la cat = current-collection
							//'cat_in'		=> $category_id, 		//the current category
							'order'				=> 'DESC',			// List in DESC order
							'orderby'        	=> 'id',			// List them in their menu order				
						);
			
						$carouselPosts = new WP_Query($args);
		   
						?>
						<?php while ($carouselPosts->have_posts()) : $carouselPosts->the_post(); ?>
						<li>
							<div class="image-carrousel">
								<?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'sliderimg' ); ?>
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo '<img src="' . $image_src[0]  . '" width="100%"  />'; ?></a>
							</div>
				
							<div style="clear:both"></div>
				
							<div class="slider-title">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</div>
						</li>
						<?php endwhile; ?>
					</ul>
			
				<?php wp_reset_postdata();?>
				</div><!-- 1- module-slider  -->
			</div><!-- loader  -->
		
		<?php } ?>	
		<!-- Fin de la boucle pour le slider de la collection  -->
		
		<?php if($post->post_content != "") { ?>
			<h2 id="ascenseur-collection">	
				<?php echo __("<!--:fr-->Aperçu de l'exposition<!--:--><!--:en-->View the exhibition<!--:-->"); ?>
			</h2>

			<div class="slider-exposition">
				<?php the_content(); ?>
			</div>
		
			<div style="clear:both"></div>
		
			<div class="view-agenda">
				<?php // On prend l'id des agenda d'exposition ?>
				<?php $page_id = 93 ?>
				<?php $page_link = get_page_link( $page_id ); ?>
				<a <a href="<?php echo esc_url( $page_link ); ?>" class="fleche-agenda"></a>
				<a <a href="<?php echo esc_url( $page_link ); ?>" class="fleche-separateur">	
					<?php echo __("<!--:fr-->Aperçu de l'agenda des expositions<!--:--><!--:en-->View the exhibitions calendar<!--:-->"); ?>
				</a>
			</div>
		<?php } ?>
		
		<div style="clear:both"></div>
		
		<div class="module-slider-footer">
			<div class="interieur gauche">
				<?php get_search_form(); ?>
			</div>
		</div>
		
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->