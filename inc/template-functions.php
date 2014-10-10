<?php
/**
 * Custom template functions for this theme.
 *
 * @package nsi
 */


//-------------------------------------------------  
//function pour le slider de Nouvelles acquisitions
//-------------------------------------------------
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'sliderimg', 175, 260, true );
	add_image_size( 'sliderimg-pub', 232, 260, true );
}


add_shortcode('instant_gallery', 'instant_gallery');  


//====== function pour le preset text in the WordPress post editor
add_filter( 'default_content', 'my_editor_content' );

function my_editor_content( $content ) {

	$content = "[instant_gallery]
<div>
Prix : <a href='mailto:contact@galerieflak.com?subject=le sujet du mail pour le moment'>nous consulter</a>
</div>";

return $content;
}

//========= Patch pour le q translate

add_filter( 'wp_default_editor', create_function('', 'return "html";') );



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
