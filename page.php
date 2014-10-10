<?php
/*
Template Name: Archives
*/

get_header(); ?>

<?php
	
	if 	(is_page(4) ) 		{$category_id = 23;} //Nouvelles acquisitions
	elseif (is_page(4772) ) {$category_id = 3;} //Afrique
	elseif (is_page(4775) )	{$category_id = 6;} //Amérique du Nord
	elseif (is_page(4774) ) {$category_id = 39;} //Asie
	elseif (is_page(4780) ) {$category_id = 8;} //Contemporary Art
	elseif (is_page(4781) ) {$category_id = 27;} //Mobilier design
	elseif (is_page(4773) ) {$category_id = 4;} //Océanie
 	elseif (is_page(4776) ) {$category_id = 28;} //Photos Afrique
	elseif (is_page(4777) ) {$category_id = 29;} //Photos Amérique du Nord
	elseif (is_page(4778) ) {$category_id = 30;} //Photos Océanie 
	elseif (is_page(4779) ) {$category_id = 32;} //Early photographs: Contemporary
	elseif (is_page(7662) ) {$category_id = 229;} //Kachinas
	
	$currentLang = qtrans_getLanguage(); 
	
	$page_title = $wp_query->post->post_title;
?>

		<div id="primary" class="content-area clearfix">
			
			<div class="raya"></div>
			
			<div id="content" class="site-content" role="main">
				
			<h1><?php echo $page_title; ?></h1>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('category-oeuvre'); ?>>
						
						<!-- Module Tout les posts de la category -->
						<div class="module-slider-total">
							
							<div class="list_carousel-total clearfix">
							    <ul>
							        <?php
									
									$args = array(
										'cat'				=> $category_id, 		//the current page
										'posts_per_page'	=> 1000,			// Only the first 20
										'order'				=> 'DESC',			// List in ascending order
										'orderby'        	=> 'id',			// List them in their menu order
										//'offset'			=> 20,				
									);
									
							        $carouselPosts = new WP_Query($args);
							       
							        ?>
							        <?php while ($carouselPosts->have_posts()) : $carouselPosts->the_post(); ?>							        
									<li>
										<div class="image-carrousel">
								            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_post_thumbnail($id, 'sliderimg'); ?></a>
										</div>
										
										<div style="clear:both"></div>
							            <div class="slider-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
										<div class="slider-title">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_field('localisation_'.$currentLang.''); ?></a>
											</div>							
							           						
							        </li>
							        <?php endwhile; ?>
							    </ul>
							</div>
						
						</div><!-- 2- module-slider  -->
						
						<!-- Module Search -->
						<div class="module-slider-footer">
							<div class="interieur gauche">
								<?php get_search_form(); ?>
							</div>
						</div>

					</article><!-- #post-<?php the_ID(); ?> -->

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>