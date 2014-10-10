<?php
/**
 * The template for displaying search forms in galerie_flak
 *
 * @package galerie_flak
 * @since galerie_flak 1.0
 */
?>

<?php
//Hack pour la search form dans autres langues
$actionurl = get_bloginfo('home');
$actionurl = qtrans_convertURL($actionurl, $locale) . '/';
?>

<form method="get" id="searchform" action="<?php echo $actionurl; ?>" role="search">
	<label for="s" class="assistive-text"><?php _e( 'Search', 'galerie_flak' ); ?></label>
	<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo __("<!--:fr-->Recherche<!--:--><!--:en-->Search<!--:-->"); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'galerie_flak' ); ?>" />
</form>
