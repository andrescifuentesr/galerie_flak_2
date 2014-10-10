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
			</div>
			
			<?php //on appele le template carte  ?>
			<?php get_template_part( 'carte' );  ?>
			
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
				$category = get_the_category();
				$category_publication = $category[1]->name;
				$category_publication_id   = $category[1]->cat_ID;

				if ( !empty($category_publication) AND $category_publication !=  'Nouvelles acquisitions') 
				{
					$category_current=$category_publication; 
				} else { 
					$category_current= "Pas de publication ";
				}
			?>
			
			<?php if (has_category( $category_current, $post ) ) { ?>
			
				<?php
					$args = array(
						'category__and' => array( $category_publication_id, 11 ), // On limite à afficher que les pieces qui sont fis de cat = pub
						'order'			 => 'DESC',				// List in ascending order
						'orderby'        => 'id',				// List them in their menu order
						'showposts'   	 => 1,
					);
			        $publicationPosts = new WP_Query($args);
		        ?>
		
		        <?php while ($publicationPosts->have_posts()) : $publicationPosts->the_post(); ?>			
			
				<div class="module-publication-single">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail($id, 'sliderimg-pub'); ?></a>
					<div class="fleche"></div>
					<a class="titre-module-publication-single" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</div>
			
				 <?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php } ?>
			
			
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

<div class="module-slider-footer-interieur">
	<div class="interieur gauche">
		<?php get_search_form(); ?>	
	</div>
</div>

<?php // on cree un bouton partager par mail ?>
<?php // $link_actuel =  echo get_permalink( $post->ID ); ?>
<?php $link_actuel = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>

<div class="module-enveloppe">
	
	<?php if($currentLang == 'fr') { ?>
	
		<a href="mailto:?subject=Galerie Flak / <?php the_title(); ?>&amp;body=Bonjour, %0A%0A
			L'œuvre suivante présentée à la Galerie Flak vous est recommandée : %0A%0A
			<?php the_permalink(); ?> %0A%0A
			%0A%0A
			Bonne journée" 
			title="Partager par Email" class="enveloppe-partager">
			<img src="<?php bloginfo('template_directory'); ?>/img/enveloppe.svg" alt="Enveloppe" >
		</a>

	<?php } else { ?>
		<a href="mailto:?subject=Galerie Flak / <?php the_title(); ?>&amp;body=Hello %0A%0A
			I thought you might be interested in this artwork presented by Galerie Flak: <lien> %0A%0A
			<?php the_permalink(); ?> %0A%0A
			%0A%0A
			All the best" 
			title="Share" class="enveloppe-partager">
			<img src="<?php bloginfo('template_directory'); ?>/img/enveloppe.svg" alt="Enveloppe" >
		</a>
	<?php } ?>

	<a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>&t=<?php echo urlencode($post->post_title); ?>" target="_blank" class="enveloppe-partager">
		<img src="<?php bloginfo('template_directory'); ?>/img/bt-facebook.svg" alt="Bouton partager facebook" width="25" height="25">
	</a>
	
	<a href="http://twitter.com/share?text=<?php the_title(); ?>&url=http://<?php echo $link_actuel; ?>" target="_blank" class="enveloppe-partager">
		<img src="<?php bloginfo('template_directory'); ?>/img/bt-twitter.svg" alt="Bouton partager twitter" width="25" height="25">
	</a>
	
</div>