<?php
/*
Template Name: Cartes
*/
get_header(); ?>

<div id="primary" class="content-area clearfix">
	
	<div class="raya"></div>
	
	<div id="content" class="site-content" role="main">
		
		<h1><?php single_cat_title(); ?></h1>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class('category-oeuvre'); ?>>
		
			<!-- Module Tout les posts de la category -->
			<div class="module-slider-total">
			
				<div class="list_carousel-total clearfix">
				    <ul>
		
						<?php
							
							$args = array(
								//'cat'				=> $category_id, 		//the current category
								'tag_id'			=> $tag_id, 		//the current category
								'posts_per_page'	=> 1000,					// Only the first 20
								'order'				=> 'DESC',				// List in ascending order
								'orderby'        	=> 'id',		// List them in their menu order
								//'offset'			=> 20,				
							);
		
							$queryCartes = new WP_Query( $args );
						?>
	

						<?php /* Start the Loop */ ?>
						<?php while ( $queryCartes->have_posts() ) : $queryCartes->the_post(); ?><!--
						--><li>
								<div class="image-carrousel">
						            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_post_thumbnail($id, 'sliderimg'); ?></a>
								</div>
			
								<div style="clear:both"></div>
					            <div class="slider-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
								<div class="slider-title">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_field('localisation_'.$currentLang.''); ?></a>
									</div>							
           						
					        </li><!--						
					--><?php endwhile; ?>
					</ul>
				</div>
		
			</div><!-- 2- module-slider  -->

		</article><!-- #post-<?php the_ID(); ?> -->
	
		<div class="module-slider-footer">
			<div class="interieur gauche">
				<?php get_search_form(); ?>
			</div>
		</div>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>