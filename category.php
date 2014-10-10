<?php get_header(); ?>

<?php

	$category 		= get_category( get_query_var( 'cat' ) );
	$category_id 	= $category->cat_ID;
	$category_slug 	= $category->slug;

/*
	$category = get_the_category();
	$category_principal = $category[1]->cat_ID;
	
	if 	(is_category(3) )	  {$category_id = 3;  $page_id = 4772;} //Afrique
	elseif (is_category(6) )  {$category_id = 6;  $page_id = 4775;} //Amérique du Nord
	elseif (is_category(39) ) {$category_id = 39; $page_id = 4774;} //Asie
	elseif (is_category(8) )  {$category_id = 8;  $page_id = 4780;} //Contemporary Art
	elseif (is_category(27) ) {$category_id = 27; $page_id = 4781;} //Mobilier design
	elseif (is_category(4) )  {$category_id = 4;  $page_id = 4773;} //Océanie
 	elseif (is_category(28) ) {$category_id = 28; $page_id = 4776;} //Photos Afrique
	elseif (is_category(29) ) {$category_id = 29; $page_id = 4777;} //Photos Amérique du Nord
	elseif (is_category(30) ) {$category_id = 30; $page_id = 4778;} //Photos Océanie 
	elseif (is_category(32) ) {$category_id = 32; $page_id = 4779;} //Early photographs: Contemporary
	elseif (is_category(229) ) {$category_id = 229; $page_id = 7662;} //Kachinas
	
	//Pour les publications
	if ($category_principal  == 11) 
		{
		$category_publication = $category[0]->cat_ID;	
	} 
	else {
		$category_publication = $category_principal;	
	}
*/	
?>

<?php 	$currentLang = qtrans_getLanguage(); ?>

		<div id="primary" class="content-area clearfix">
			
			<div class="raya"></div>
			
			<div id="content" class="site-content" role="main">
				
				<h1><?php single_cat_title(); ?></h1>
					
				<article id="post-<?php the_ID(); ?>" <?php post_class('category-oeuvre'); ?>>

					<div class="module-slider loading">
					
						<div class="flexslider carousel">
						    <ul class="slides">
						        <?php
								// First loop posts sticky_posts
								$sticky = get_option( 'sticky_posts' );
					
								$args = array(
									'cat'				=> $category_id, 		//the current category
									'posts_per_page'	=> 20,					// Only the first 20
									'post__in'  		=> $sticky,			
								);

						        $carouselPosts = new WP_Query($args);
						       	//on crée une variable count pour le nombre de post display par page
								$count = 0;
						        ?>
						        <?php while ($carouselPosts->have_posts()) : $carouselPosts->the_post(); ?><!--
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
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_field('localisation_'.$currentLang.''); ?></a>
										</div>	
						        </li><!--
						      --><?php 
									endwhile; 
									wp_reset_postdata();
								
									// second loop posts -sticky_posts
							
									$args2 = array(
										'cat'					=> $category_id, 		//the current category
										'posts_per_page'		=> -1,					// Only the first 20
										'ignore_sticky_posts'	=> 1,
										'post__not_in'			=> get_option( 'sticky_posts' ),
										'order'				=> 'DESC',				// List in ascending order
										'orderby'        	=> 'id',		// List them in their menu order				
									);

						        	$carouselPosts2 = new WP_Query($args2);
						        	while ($carouselPosts2->have_posts()) : $carouselPosts2->the_post(); ?><!--
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
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_field('localisation_'.$currentLang.''); ?></a>
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
									<?php echo __("<!--:fr-->Collection complète<!--:--><!--:en-->All the collection<!--:-->"); ?>
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