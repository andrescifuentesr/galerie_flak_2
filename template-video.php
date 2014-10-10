<?php
/*
Template Name: Video
*/
get_header(); ?>

<div id="primary" class="content-area clearfix">
	
	<div class="raya"></div>
	
	<div id="content" class="site-content" role="main">
		
		<h1><?php the_title(); ?></h1>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class('category-video'); ?>>
		
			<!-- Module Tout les posts de la category -->
			<div class="module-slider-video">
			
				<div class="list_video clearfix">

					<?php 
						$videos = get_posts(array(
						'post_type' 	=> 'post',
						'orderby'       => 'Id',
						'order'			=> 'DESC',
						'posts_per_page'  	=> -1,
						'meta_query' => array(
							array(
								'key' => 'video', // name of custom field
								'value' => ' ',
								'compare' => '!='
							)
						)
						));
						
						$videos_names = array();
						
						if( $videos )
						{
							foreach( $videos as $video )
							{
								// get the video
								$videos_name = get_field('video' , $video->ID);


								// add video to $videos, only if it doesn't already exist
								if( !in_array($videos_name, $videos_names) )
								{
									$videos_names[] = $videos_name;
								}

							}
						}

					?>


					<?php if( $videos_names ): ?>
						<ul>
						<?php foreach( $videos_names as $videos_name ): ?>

							<li class="video-carrousel">
								<?php echo $videos_name ?>
							</li>

						<?php endforeach; ?>
						</ul>
					<?php endif; ?>

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