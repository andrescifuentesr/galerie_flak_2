<?php
/**
 * Custom template functions for this theme.
 *
 * @package galerie_flak
 */


//-------------------------------------------------  
//function pour le slider de Nouvelles acquisitions
//-------------------------------------------------
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'sliderimg', 175, 260, true );
	add_image_size( 'sliderimg-pub', 232, 260, true );
}


//====== function pour le preset text in the WordPress post editor
add_filter( 'default_content', 'my_editor_content' );

function my_editor_content( $content ) {

// 22-10-2015
// 	$content = "[instant_gallery]
// <div>
// Prix : <a href='mailto:contact@galerieflak.com?subject=le sujet du mail pour le moment'>nous consulter</a>
// </div>";

	$content = "Prix : <a href='mailto:contact@galerieflak.com?subject=le sujet du mail pour le moment'>nous consulter</a>";

	return $content;
}

//========= Patch pour le q translate
// 22-10-2015
// add_filter( 'wp_default_editor', create_function('', 'return "html";') );



//======================
//fx menuicons styles
//======================
function add_menu_icons_styles(){
?>
 
<style>
#menu-posts-home-slider .wp-menu-image:before {
	content: "\f161";
}

</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


//-------------------------------------------------------------
// Ancien fx Instant Image Gallery by John Sexton
// Maintenant on utilise plus le shortcode
//-------------------------------------------------------------

function instant_gallery() {

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

								//on define s'il existe un link e-catalogue
								$image_catalogue = get_field('e-catalogue_link_'.$currentLang.'');
								
								if( get_field('e-catalogue') ) {									
									$link_instant_gallery =  $image_catalogue;
									echo $link_instant_gallery;
									echo 'test';
								} else {
									$link_instant_gallery =  $image_fancybox;
								}
							?>

							<!-- Display the first image attachment as the large image in the main gallery area -->
							<a href="<?php echo $link_instant_gallery; ?>" id="ig-fancy">
								<?php echo wp_get_attachment_image($attachment->ID, 'full', false, $default_attr); ?>
							</a>


						<!-- Close the main display area -->
						</div>

						<!-- Open the Thumbnail navigation -->
						<ul id="ig-thumbs">
				
				<!-- End the block of stuff that we only do for the first image  -->
				<?php } ?> 

						<!-- Now, for each of the thumbnail images, label the LI with an ID of the appropriate thumbnail number -->
						<li id="ig-thumb-<?php echo $count+1; ?>">

							<?php if ($count==0) {

									// If this is the first thumbnail, add a class of 'selected' to it so it will be highlighted
									$thumb_attr = array(
										'class' => "thumb selected",
									);

								} else {

									// For all other thumbnails, just add the basic class of 'thumb'
									$thumb_attr = array(
										'class' => "thumb",
									);

								} ?>
					
							<!-- Output a thumbnail-sized version of the image that has the attributes defined above -->
							<?php echo wp_get_attachment_image($attachment->ID, 'full', false, $thumb_attr); ?>
			
						</li>
				
				<!-- Increment the counter so we can keep track of which thumbnail we are on -->
				<?php $count = $count + 1; } ?>
						
					<!-- Close the thumbnail navigation list -->
					</ul>
	
				<!-- Close the entire Gallery -->
				</div>
				
	<?php }

}

// Create the Shortcode
add_shortcode('instant_gallery', 'instant_gallery');


add_shortcode('instant_gallery', 'mte_return_empty_shortcode');
function mte_return_empty_shortcode(){
	return '';
}