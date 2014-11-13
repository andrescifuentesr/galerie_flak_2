<?php
	$argsSlider = array(
		'post_type' 		=> 'home-slider', 	//Costum type Proyectos			
		'order'				=> 'DESC',			// List in ascending order
		'orderby'      		=> 'menu_order',	// List them in their menu order
		'posts_per_page'	=>   -1, 			// Show all
	);

	$sliderHome = new WP_Query($argsSlider);
?>


<div class="flexslider-wrapper-home loading">
	
	<div class="flexslider-home">
		<ul class="slides">
			<?php /* Start the Loop */ ?>
			<?php while ($sliderHome->have_posts()) : $sliderHome->the_post(); ?>
				<?php $image_slider = get_field('home_slider_image'); ?>
				<li>
					<a href="<?php the_field('home_slider_link'); ?>">
						<img src="<?php echo $image_slider['url']; ?>" alt="<?php echo $image_slider['alt']; ?>" >
					</a>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
</div>
<?php wp_reset_postdata(); ?>