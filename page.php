<?php
/*
Template Name: Archives
*/

get_header(); ?>

<?php
	
	$currentLang = qtrans_getLanguage(); 

?>

		<div id="primary" class="content-area clearfix">
			
			<div class="raya"></div>
			
			<div id="content" class="site-content" role="main">
				
			<h1><?php the_title(); ?></h1>
					
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<?php the_content(); ?>

					</article><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>