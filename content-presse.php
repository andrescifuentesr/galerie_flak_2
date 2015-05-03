<?php
/**
 * @package galerie_flak
 * @since galerie_flak 1.0
 */
?>

<?php $currentLang = qtrans_getLanguage(); ?>

<article id="post-<?php the_ID(); ?>" class="ouvre">

	<div class="entry-content">
		
		<div class="module-slider" >
			
			<div class="list_carousel_2 clearfix">
			    <ul id="foo3">
			        <?php
					$args = array(
						'post_type'		=> 'presse',
						'order'			=> 'DESC',				// List in ascending order
						'orderby'       => 'id',		// List them in their menu order
						'showposts'   	=> -1, 				// Show all attachments
						'post_status'   => null,				// For any post status
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
			<h3><?php the_field('date_presse_'.$currentLang.''); ?></h3>
			
			<div class="single-content">

				<!-- We call directly a template for the gallery instead a shortcode 12-01-2015 -->
				<?php get_template_part( 'inc/template-instant-gallery-presse' );  ?>

				<div class="text-the_content">
					<!-- we download the pdf -->
					<?php if ( get_field('link_presse_pdf') ) { ?>
						<!-- get pfd link press data -->
						<?php $link_presse = get_field('link_presse_pdf'); ?>
						<?php echo __("<!--:fr-->Télécharger :<!--:--><!--:en-->Download: <!--:-->"); ?>
						<a href="<?php echo $link_presse['url']; ?>" alt="<?php echo $link_presse['title']; ?>">
							<?php echo $link_presse['title']; ?>
						</a>
					<!-- we go to the site -->
					<?php } elseif ( get_field('link_presse_url') ) { ?>
						<a href="<?php the_field('link_presse_url') ?>" alt="<?php the_field('link_presse_url') ?>" target="_blank">
							<?php echo __("<!--:fr-->Visiter le site Internet<!--:--><!--:en-->Visit the site<!--:-->"); ?>
						</a>
					<?php }  ?>
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