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
					
				<article id="post-<?php the_ID(); ?>" <?php post_class('category-oeuvre'); ?>>

					<div class="module-slider loading">
					
						<div class="flexslider carousel">
						    <ul class="slides">
						        <?php
					
								$args = array(
									'cat'					=> $category_id, 		//the current category
									'posts_per_page'		=> -1,					// Only the first 20
									'order'					=> 'DESC',				// List in desscending order
									'orderby'        		=> 'menu_order',		// List them in their menu order			
								);
							
						        $carouselPosts = new WP_Query();
						        $carouselPosts->query($args);
								//on crée une variable count pour le nombre de post display par page
						       	$count = 0;
						        ?>
						        <?php while ($carouselPosts->have_posts()) : $carouselPosts->the_post(); ?><!--
						       --><li>
									<div class="image-carrousel">
										<?php $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'sliderimg' ); ?>
							            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo '<img src="' . $image_src[0]  . '" width="100%"  />'; ?></a>
									</div>

						            <div class="slider-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
						            <div class="slider-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_field('localisation_'.$currentLang.''); ?></a></div>							
						        </li><!--
						       --><?php
									$count++;
									endwhile; 
									wp_reset_postdata();
								?>
						    </ul>
						</div>
				
					</div>
				
					<div style="clear:both;"></div>
				
					<!-- Module Search -->
					<div class="module-slider-footer">
						
						<?php if ($count > '5') { ?>
							<div class="module-apercu-complete">

								<?php //$page_id = 4?>
								
								<a href="#" class="fleche-separateur destructor">
									<?php echo __("<!--:fr-->Collection complète<!--:--><!--:en-->All the collection<!--:-->"); ?>
									<span class="fleche-exposition" ></span>
								</a>
							</div>

						<?php } ?>
						
						<div class="interieur gauche apercu-hack">
							<?php get_search_form(); ?>
						</div>
					</div>

				</article><!-- #post-<?php the_ID(); ?> -->

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>