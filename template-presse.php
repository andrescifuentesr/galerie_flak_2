<?php
/*
Template Name: Template Press
*/

get_header(); ?>

<?php $currentLang = qtrans_getLanguage(); ?>

		<div id="primary" class="content-area clearfix">
			
			<div class="raya"></div>
			
			<div id="content" class="site-content" role="main">
				
				<h1><?php the_title(); ?></h1>
					
				<article id="post-<?php the_ID(); ?>" <?php post_class('category-presse'); ?>>

					<div class="module-slider loading">
					
						<div class="flexslider carousel">
						    <ul class="slides">

								<?php
									$args = array(
										'post_type' 		=> 'presse', 	//Costum type Proyectos
										'order'				=> 'DESC',		// List in ascending order
										'orderby'      		=> 'id',		// List them in their menu order
										'posts_per_page'	=>   -1, 		// Show the last one
									);

									$QueryPresse = new WP_Query($args);
									$count = 0;
								?>

					        	<?php /* Start the Loop */ ?>
								<?php while ($QueryPresse->have_posts()) : $QueryPresse->the_post(); ?><!--
						      --><li>
									<div class="image-carrousel">
							            <?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'sliderimg' ); ?>
							            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo '<img src="' . $image_src[0]  . '" width="100%"  />'; ?></a>
									</div>
								
									<div style="clear:both"></div>
								
						            <div class="slider-title">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</div>
									<div class="slider-title">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_field('date_presse_'.$currentLang.''); ?>
										</a>
									</div>
						      	</li><!--						
						     --><?php 
									$count++;
									endwhile; 
									wp_reset_postdata();
								?>							
						    </ul>
						</div>
					</div><!-- 1- module-slider  -->
					
					<div style="clear:both"></div>
				
					<!-- Module Search -->
					<div class="module-slider-footer">
						
						<?php if ($count > '5') { ?>
							<div class="module-apercu-complete">
								<a href="#" class="fleche-separateur destructor">
									<?php echo __("<!--:fr-->Voir la Collection complète<!--:--><!--:en-->View all the collection<!--:-->"); ?>
									<span class="fleche-exposition" ></span>
								</a>
							</div>

						<?php } ?>
						
						<div class="interieur gauche apercu-hack">
							<?php get_search_form(); ?>
						</div>
					</div><!-- Module Search -->

				</article><!-- #post-<?php the_ID(); ?> -->				
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>