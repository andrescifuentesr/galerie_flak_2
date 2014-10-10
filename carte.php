<?php 
	//on crée une recherche pour tous les tags Cartes
	//il va afficher la carte et créer un lien vers la page tag
	
	if ($all_the_tags);
	$all_the_tags = get_the_tags();
	foreach($all_the_tags as $this_tag) {
		
		//on cree une variable qui stock l'nomme du tag
		$tag_name = $this_tag->name;
		//echo $this_tag->name;
		
		//on cree une variable qui stock l'id du tag
		$tag_id = $this_tag->term_id;
		//echo $this_tag->term_id;
		
		//on cree une variable qui stock le slug du tag
		$tag_slug = $this_tag->slug;
		//echo $tag_slug;
?>
	<?php if ( $tag_slug == "carte-afrique-australe" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-afrique-central" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>

	<?php } else if ( $tag_slug == "carte-afrique-est" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-afrique-ouest" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-amazonie" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-alaska" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-grands-lacs" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-groenland" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-nord-est" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-northwest-coast" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-plaines" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-sudouest" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-amerique-sud" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-mississippi" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-asie-sudest" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-australie" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-europe" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-indonsesie" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-japon" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-madagascar" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-magreb" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-archipel-bismarck" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-est-nouvelle-guinee" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-apouasie-nouvelle-guinee" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
		
	<?php } else if ( $tag_slug == "carte-micronesie" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-polynesie" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-hawaii" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-ile-de-paques" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-nouvelle-zelande" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-polynesie-centrale" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>
	
	<?php } else if ( $tag_slug == "carte-siberia" ) { ?>
		<a href="<?php echo get_tag_link($tag_id); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/img/cartes/<?php echo $tag_slug; ?>.png" alt="<?php echo $tag_name; ?>" class="single-carte"/>		
		</a>		
	<?php }   ?>

<?php //fin du If pour le cartes ?>
<?php } ?>