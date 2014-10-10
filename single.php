<?php
/**
 * The Template for displaying all single posts.
 *
 * @package galerie_flak
 * @since galerie_flak 1.0
 */

get_header(); ?>

	<?php
		$category = get_the_category();
		$category_id   = $category[0]->cat_ID;
		$category_name = $category[0]->name;

		$category_publication = $category[1]->name;
		$category_publication_id   = $category[1]->cat_ID;

	?>

		<div id="primary" class="content-area clearfix">
			
			<div class="raya"></div>
			
			<div id="content" class="site-content" role="main">
			
			
			<!-- We select the name for our post if publication or normal -->
			<?php if ( in_category('publication') ) { ?>
				<h1>Publications</h1>
			<?php } else { ?>
				<h1><?php echo $category_name; ?></h1>
			<?php }  ?>	
			
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php
				if ( in_category('publication') ) {
					get_template_part( 'publication', 'single' ); 
				} elseif ( in_category('exposition') ) {
					get_template_part( 'exposition', 'single' ); 
				} else {
					get_template_part( 'content', 'single' ); 
				}
				?>
				

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->


<?php get_footer(); ?>