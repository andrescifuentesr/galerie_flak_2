<?php
/**
 * @package galerie_flak
 * @since galerie_flak 1.0
 */
?>

<?php $currentLang = qtrans_getLanguage(); ?>

<article id="post-<?php the_ID(); ?>" class="ouvre">

	<div class="entry-content">
		
		<div class="module-single clearfix">
			
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<h3><?php the_field('localisation_'.$currentLang.''); ?></h3>
			
			<div class="single-content">
				<?php the_content(); ?>

				<?php //on appele le template carte  ?>
				<?php get_template_part( 'carte' );  ?>				

				<?php if( get_field('information_additionnel_'.$currentLang) ) { ?>
					<div class="block-savoir-plus">
						<span id="block-savoir-plus--button">
							<?php echo __("<!--:fr-->En savoir plus<!--:--><!--:en-->Read More<!--:-->"); ?>
						</span>
						<div class="block-savoir-plus--content">
							<?php the_field('information_additionnel_'.$currentLang); ?>
						</div>
					</div>
				<?php } ?>
			</div>
			
		</div><!-- .module-single -->		

		<div class="sidebar-left">
			
			<div class="module-slider">
				
				<div class="list_carousel_2 clearfix">
				    
					<ul id="foo3">
				        <?php
						$category = get_the_category();
						$category_id   = $category[0]->cat_ID;
						$args = array(
							'cat'			 => $category_id,
							'order'			 => 'DESC',			// List in ascending order
							'orderby'        => 'id',			// List them in their menu order
							'showposts'    => -1, 				// Show all attachments
							'post_status'    => null,			// For any post status
						);
				        $carouselPosts = new WP_Query($args);

				        ?>
				        <?php while ($carouselPosts->have_posts()) : $carouselPosts->the_post(); ?>
				        <li>
				            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail($id, 'sliderimg'); ?></a>						
				        </li>
		
				        <?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
				    </ul>
				    <div class="clearfix"></div>
				    <a class="prev" id="prev3" href="#"><span></span></a>
				    <a class="next" id="next3" href="#"><span></span></a>
				</div>
		
			</div><!-- module-slider -->

			<!-- Module pour les publication -->			
			<?php
				$categories = get_the_category();
				if($categories){
					foreach($categories as $category) {

						$args = array(
							'category__and' => array( $category->cat_ID , 11 ), // On limite à afficher que les pieces qui sont fis de cat = pub
							'order'			 => 'DESC',				// List in ascending order
							'orderby'        => 'id',				// List them in their menu order
							'showposts'   	 => 1,
							// 'category__not_in'   	 => 23
						);
						$publicationPosts = new WP_Query($args);
					
						while ($publicationPosts->have_posts()) : $publicationPosts->the_post(); ?>			

							<div class="module-publication-single">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail($id, 'sliderimg-pub'); ?></a>
								<a class="titre-module-publication-single" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</div>

					 	<?php endwhile; 
					} //end foreach
				}//end if
			?>
			<?php wp_reset_postdata(); ?>
			
			
			<?php if( get_field('video') ) {  ?>
				<div class="video-single clearfix">
					<a href='<?php the_field('video'); ?>' class="video">
						<?php if( get_field('image_video') ) { ?>
							<img src="<?php bloginfo('template_directory'); ?>/img/video-play.png" alt="Filtre video" class="video-filtre">
							
							<?php $image_video = get_field('image_video'); ?>
							<img src="<?php echo $image_video['url']; ?>" alt="<?php echo $image_video['alt']; ?>" alt="<?php the_title(); ?>" />

							<!-- <img src="<?php bloginfo('template_directory'); ?>/img/video/<?php the_field('image_video'); ?>"  alt="<?php the_title(); ?>"> -->
						<?php } else { ?>
							<img src="<?php bloginfo('template_directory'); ?>/img/logo-video.jpg" alt="Video Galerie Flak">
						<?php } ?>
					</a>
				</div>
			<?php } ?>
		
		<!-- FinModule pour le publication -->		
		
		</div><!-- sidebar left -->

<!-- =========  END Barre latereal =========== -->
	
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php //we include the footer template ?>
<?php get_template_part( 'inc/template-single-footer' );  ?>