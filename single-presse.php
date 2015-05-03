<?php
/**
 * The Template for displaying all single posts.
 *
 * @package galerie_flak
 * @since galerie_flak 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area clearfix">
			
			<div class="raya"></div>
			
			<div id="content" class="site-content" role="main">
			
				<h1><?php echo __("<!--:fr-->Revue de Presse<!--:--><!--:en-->Press Release<!--:-->"); ?></h1>
			
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'content', 'presse' ); ?>				

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->


<?php get_footer(); ?>