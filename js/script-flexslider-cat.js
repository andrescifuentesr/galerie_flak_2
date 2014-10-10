//=============================
//=====   FlexSlider Horizontal
//=============================
(function() {

	// store the slider in a local variable
	var fenetre = jQuery(window),
				flexslider;

	// tiny helper function to add breakpoints
	function getGridSize() {
		return (window.innerWidth < 600) ? 2 :
				(window.innerWidth < 900 && window.innerWidth > 601  ) ? 4 :
				(window.innerWidth < 1460 && window.innerWidth > 901  ) ? 5 : 6;
	}
 
	fenetre.load(function() {
		jQuery('.flexslider').flexslider({
			animation: "slide",
			animationLoop: true,
			move : 2,
			controlNav: false,
			slideshow: false,
			itemWidth: 220,
			itemMargin: 30,
			minItems: getGridSize(), // use function to pull in initial value
			maxItems: getGridSize(), // use function to pull in initial value
			start: function(slider){
				$('.module-slider').removeClass('loading');
				flexslider = slider;
			}
		});
	});
 
	// check grid size on resize event
	fenetre.resize(function() {
		var gridSize = getGridSize();

		flexslider.vars.minItems = gridSize;
		flexslider.vars.maxItems = gridSize;
	});

	$(".destructor").on("click", function() {
		//event.preventDefault();
		jQuery('.flexslider').flexslider('destroy');
		jQuery('.module-slider div').removeClass('flexslider carousel');
		jQuery('.slides').addClass('list_carousel-total');
		$(this).hide();
	});
}());
//fin de la fx pour le carousel horizontal
