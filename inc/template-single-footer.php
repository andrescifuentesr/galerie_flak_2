<div class="module-slider-footer-interieur">
	<div class="interieur gauche">
		<?php get_search_form(); ?>	
	</div>
</div>

<?php // on cree un bouton partager par mail ?>
<?php // $link_actuel =  echo get_permalink( $post->ID ); ?>
<?php $link_actuel = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>

<div class="module-enveloppe">
	
	<?php if($currentLang == 'fr') { ?>
	
		<a href="mailto:?subject=Galerie Flak / <?php the_title(); ?>&amp;body=Bonjour, %0A%0A
			L'œuvre suivante présentée à la Galerie Flak vous est recommandée : %0A%0A
			<?php the_permalink(); ?> %0A%0A
			%0A%0A
			Bonne journée" 
			title="Partager par Email" class="enveloppe-partager">
			<img src="<?php bloginfo('template_directory'); ?>/img/enveloppe.svg" alt="Enveloppe" >
		</a>

	<?php } else { ?>
		<a href="mailto:?subject=Galerie Flak / <?php the_title(); ?>&amp;body=Hello %0A%0A
			I thought you might be interested in this artwork presented by Galerie Flak: <lien> %0A%0A
			<?php the_permalink(); ?> %0A%0A
			%0A%0A
			All the best" 
			title="Share" class="enveloppe-partager">
			<img src="<?php bloginfo('template_directory'); ?>/img/enveloppe.svg" alt="Enveloppe" >
		</a>
	<?php } ?>

	<a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>&t=<?php echo urlencode($post->post_title); ?>" target="_blank" class="enveloppe-partager">
		<img src="<?php bloginfo('template_directory'); ?>/img/bt-facebook.svg" alt="Bouton partager facebook" width="25" height="25">
	</a>
	
	<a href="http://twitter.com/share?text=<?php the_title(); ?>&url=http://<?php echo $link_actuel; ?>" target="_blank" class="enveloppe-partager">
		<img src="<?php bloginfo('template_directory'); ?>/img/bt-twitter.svg" alt="Bouton partager twitter" width="25" height="25">
	</a>
	
</div>