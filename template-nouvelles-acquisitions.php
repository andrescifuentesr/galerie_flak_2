<?php
/*
Template Name: Nouvelles acquisitions
*/

get_header(); ?>
<?php $currentLang = qtrans_getLanguage(); ?>

		<div id="primary" class="content-area clearfix">
			
			<div class="raya"></div>
			
			<div id="content" class="site-content" role="main">
				
				<h1><?php single_cat_title(); ?></h1>
					
				<article id="post-<?php the_ID(); ?>" <?php post_class('category-oeuvre'); ?>>

					<div class="module-slider">
					
						<div class="list_carousel clearfix">
						    <ul id="foo2">
						        <?php
					
								$args = array(
									'cat'				=> 23, 		//the current category
									'posts_per_page'	=> -1,					// Only the first 20
									'order'				=> 'DESC',				// List in ascending order
									'orderby'        	=> 'id',		// List them in their menu order				
								);
							
						        $carouselPosts = new WP_Query();
						        $carouselPosts->query($args);
								//on crée une variable count pour le nombre de post display par page
						       	$count = 0;
						        ?>
						        <?php while ($carouselPosts->have_posts()) : $carouselPosts->the_post(); ?>
						        <li>
									<div class="image-carrousel">
							            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_post_thumbnail($id, 'sliderimg'); ?></a>
									</div>

						            <div class="slider-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
						            <div class="slider-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_field('localisation_'.$currentLang.''); ?></a></div>							
						        </li>
						        <?php
									$count++;
									endwhile; 
									wp_reset_postdata();
								?>
						    </ul>
						    <div class="clearfix"></div>
						    <a class="prev" id="prev2" href="#"><span>prev</span></a>
						    <a class="next" id="next2" href="#"><span>next</span></a>
						</div>
				
					</div>
				
					<div style="clear:both;"></div>
				
					<!-- Module Search -->
					<div class="module-slider-footer">
						
						<?php if ($count > '5') { ?>
							<div class="module-apercu-complete">
								<?php $page_id = 4?>
								<a href="<?php echo get_permalink($page_id) ?>" class="fleche-separateur">
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