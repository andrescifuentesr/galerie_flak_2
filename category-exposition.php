<?php get_header(); ?>
<?php
	$currentLang = qtrans_getLanguage();
	$category 		= get_category( get_query_var( 'cat' ) );
	$category_id 	= $category->cat_ID;
?>

		<div id="primary" class="content-area clearfix">
			
			<div class="raya"></div>
			
			<div id="content" class="site-content" role="main">
				
			<h1><?php single_cat_title(); ?></h1>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('category-expo'); ?>>

						<div class="module-slider loading">
							
							<div class="flexslider carousel">
							    <ul class="slides">
							        <?php
									
									$args = array(
										'category__in'		=> $category_id, 		//the current category
										'posts_per_page'	=> 100,					// Only the first 20
										'order'				=> 'DESC',				// List in ascending order
										'orderby'        	=> 'id',		// List them in their menu order				
									);
									
							        $carouselPosts = new WP_Query($args);
							       
							        ?>
							        <?php while ($carouselPosts->have_posts()) : $carouselPosts->the_post(); ?>
							        <li class="publication-slider">
										<div class="image-carrousel">
											<?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'sliderimg-pub' ); ?>
								            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo '<img src="' . $image_src[0]  . '" width="100%"  />'; ?></a>
										</div>
										
										<div style="clear:both"></div>
										
							            <div class="slider-title_2">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
										</div>
										<div class="slider-title_2">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_field('date_expo_'.$currentLang.''); ?></a>
											</div>
												
							        </li>
							        <?php endwhile; ?>
							    </ul>
							</div>
						
						</div><!-- 1- module-slider  -->
						
						<div style="clear:both;"></div>
												
						<!-- Div pour acceder aux expo archives  -->
						
						<div class="module-expo-archive">
							<h2>Nos Archives</h2>
							<a href="http://www.galerieflak.com/indexexpos.htm" class="titre-module-publication-single"  title="archives"><img src="<?php bloginfo('template_directory'); ?>/img/Logo-expo.jpg" alt="Archives"></a>
						</div>						
												
						<!-- Fin du div pour acceder aux expo archives  -->
						
						<div class="module-slider-footer">
							<div class="interieur gauche">
								<?php get_search_form(); ?>
							</div>
						</div>

					</article><!-- #post-<?php the_ID(); ?> -->

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>