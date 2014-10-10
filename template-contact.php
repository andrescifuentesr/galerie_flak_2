<?php
/*
Template Name: Contact
*/

get_header(); ?>

		<div id="primary" class="content-area clearfix">
	
			<div class="raya"></div>
	
			<div id="content" class="site-content" role="main">
		
				<h1><?php the_title(); ?></h1>
				
				<div style="clear:both"></div>
				
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content(); ?>
	
					</article><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; // end of the loop. ?>
		
				<div class="info-contact clearfix">

					<div class="adresse">
						<div class="img-footer-index">
							<img src="<?php bloginfo('template_directory'); ?>/img/logo-petit.png" alt="Galerie Flak">
						</div>

						<p><?php echo __("<!--:fr-->	8 rue des Beaux-Arts 75006 Paris France<br/>
								tél: (+ 33) 1 46 33 77 77 <br/> 
								fax: (+ 33) 1 46 33 27 57<br/>
								e-mail: <a href='mailto:contact@galerieflak.com'>contact@galerieflak.com</a><!--:-->
							<!--:en-->8 rue des Beaux-Arts 75006 Paris France<br/>
								tel: (+ 33) 1 46 33 77 77 <br/> 
								fax: (+ 33) 1 46 33 27 57<br/>
								e-mail: <a href='mailto:contact@galerieflak.com'>contact@galerieflak.com</a><!--:-->"); 
							?>
						</p>
					</div>

				</div>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>