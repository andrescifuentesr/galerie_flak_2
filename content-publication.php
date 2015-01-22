<?php
/**
 * @package galerie_flak
 * @since galerie_flak 1.0
 */
?>

<?php
	$category = get_the_category();
	$category_principal = $category[0]->cat_ID;
	if ($category_principal  == 11) {
		$category_id = $category[1]->cat_ID;	
	} 
	else {
		$category_id = $category_principal;	
	}
	$currentLang = qtrans_getLanguage();
?>

<article id="post-<?php the_ID(); ?>" class="publication">

	<div class="entry-content">
		
		<div class="module-slider">
			
			<div class="list_carousel_2 clearfix">
			    <ul id="foo3">
			        <?php
					$args = array(
						'category__in'	 => 11,
						'order'			 => 'DESC',				// List in ascending order
						'orderby'        => 'id',		// List them in their menu order
						'showposts'    => -1, 				// Show all attachments
						'post_status'    => null,				// For any post status
					);
			        $carouselPosts = new WP_Query();
			        $carouselPosts->query($args);
			        ?>
			        <?php while ($carouselPosts->have_posts()) : $carouselPosts->the_post(); ?>
			        <li class="clearfix">
			            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail($id, 'sliderimg'); ?></a>						
			        </li>
					
			
			        <?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
			
			    </ul>
			    <div class="clearfix"></div>
			    <a class="prev" id="prev3" href="#"><span>prev</span></a>
			    <a class="next" id="next3" href="#"><span>next</span></a>
			</div>
		</div><!-- module-slider -->
		
		<div class="module-single clearfix">
			
			<h1 class="entry-title"><?php the_title(); ?></h1>
			
			<div class="single-content">

				<!-- We call directly a template for the gallery instead a shortcode 12-01-2015 -->
				<?php get_template_part( 'inc/template-instant-gallery-publication' );  ?>

				<div class="text-the_content">
					<?php the_content(); ?>
				</div>
				
				<div class="text-catalogue">
					<!-- On defini s'il existe un e-catalogue  -->
					<?php if( get_field('e-catalogue') ) { ?>
							<a href="<?php the_field('e-catalogue_link_'.$currentLang.''); ?>" title="<?php the_title_attribute(); ?>" class="underline">
								<?php echo __("<!--:fr-->Afficher l'ouvrage<!--:--><!--:en-->Download the e-book<!--:-->"); ?>
							</a>
							<br/>	
					<?php } ?>
					<!-- Boucle pour image/e-catalogue  -->
				
					<!-- On defini s'il existe un apercu des oeuvres de la collection  -->
					<?php // Get the URL of this category?>
					<?php $category_link = get_category_link( $category_id ); ?>					
					<?php if( get_field('apercu-collection') ) { ?>
						<a href="<?php echo esc_url( $category_link ); ?>">
							<?php echo __("<!--:fr-->Un aperçu des oeuvres de la collection<!--:--><!--:en-->A first glimpse at the collection<!--:-->"); ?>
						</a>
					<?php } ?>
				</div>
				<!-- On defini s'il existe un apercu des oeuvres de la collection  -->				
			</div>
		</div><!-- .module-single -->		
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<div class="module-slider-footer-interieur">
	<div class="interieur gauche">
		<?php get_search_form(); ?>	
	</div>
</div>