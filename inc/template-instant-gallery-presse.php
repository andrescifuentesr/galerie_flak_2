<?php
/*
Plugin Name: Instant Gallery
Plugin URI: http://www.heyjohnsexton.com/projects/
Description: Instantly creates a simple image gallery from any images uploaded to a post or page
Author: John Sexton
Version: 1.0
Author URI: http://www.heyjohnsexton.com
*/

/*  Copyright 2012 John Sexton  (email : heyjohnsexton@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


//-------------------------------------------------------------
// Instant Image Gallery by John Sexton
//-------------------------------------------------------------

$currentLang = qtrans_getLanguage();

global $post;

$args = array(
	'post_parent'    => $post->ID,			// For the current post
	'post_type'      => 'attachment',		// Get all post attachments
	'post_mime_type' => 'image',			// Only grab images
	'order'			 => 'ASC',				// List in ascending order
	'orderby'        => 'menu_order',		// List them in their menu order
	'numberposts'    => -1, 				// Show all attachments
	'post_status'    => null,				// For any post status
);

// Retrieve the items that match our query; in this case, images attached to the current post.
$attachments = get_posts($args);

// If any images are attached to the current post, do the following:
if ($attachments) {	

	// Initialize a counter so we can keep track of which image we are on.
	$count = 0;
	
	// Now we loop through all of the images that we found 
	foreach ($attachments as $attachment) { 
		 		
		// Below here are the main containers and first large image; stuff we will only want to output one time.
		if($count == 0) { ?>
		
			<!-- Whole Gallery container (inludes thumbnails) -->
			<div id="instant-gallery">
				
				<!-- Main Display Area -->
				<div id="ig-main">

					<!-- Set the parameters for the image we are about to display. -->
					<?php $default_attr = array(
							'id' 	=> "ig-hero",
							'alt'   => trim(strip_tags( get_post_meta($attachment_id, '_wp_attachment_image_alt', true) )),
							'title' => trim(strip_tags( $attachment->post_title )),
						);
					?>

					<?php 
						//on cree une array avec les images de l'article
						$image_attributes = wp_get_attachment_image_src( $attachment->ID, 'full'); // returns an array
						$image_fancybox = $image_attributes[0];

						//01-05-2015
						//on define s'il existe un pdf ou un URL					
						
						if( get_field('link_presse_pdf') ) {
							$link_instant_gallery =  get_field('link_presse_pdf');
							$link_instant_gallery =  $link_instant_gallery['url'];
						} elseif( get_field('link_presse_url') ) {	
							$link_instant_gallery =  get_field('link_presse_url');
						} else {
							$link_instant_gallery =  $image_fancybox;
						}
					?>

					<!-- Display the first image attachment as the large image in the main gallery area -->
					<a href="<?php echo $link_instant_gallery; ?>" id="ig-fancy" target="_blank">
						<?php echo wp_get_attachment_image($attachment->ID, 'full', false, $default_attr); ?>
					</a>


				<!-- Close the main display area -->
				</div>

			<!-- Close the entire Gallery -->
			</div>

		<!-- End the block of stuff that we only do for the first image  -->
		<?php } ?>

	<!-- for each -->
	<?php } ?> 
		
<?php } ?>