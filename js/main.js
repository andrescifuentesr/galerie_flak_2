//=============================
//===== Instant Gallery 
//=============================

//	Wrap the jQuery code in the generic function to allow use of 
//  the $ shortcut in WordPress's no-conflict jQuery environment

( function ($) {

	$('#ig-thumbs').delegate('img','click', function(){		// When someone clicks on a thumbnail

		$('#ig-hero').attr('src',$(this).attr('src').replace('-150x150',''));	// Replace the Full Sized version of selected image

		$('#ig-fancy').attr('href',$(this).attr('src').replace('-150x150','')); // Replace la src for the Fancybox
		
		$('#ig-thumbs li img').removeClass("selected");				// Remove "selected" class from all thumbnails
		$(this).addClass("selected");								// Add "selected" class to selected thumnail

		$('#ig-title').html($(this).attr('alt'));					// Replace the Title with Title of selected image				
	});

	// Preload all other images in the slideshow so we don't have to wait
	// when we click on them. This also helps avoid awkward transitions 
	// when the description for the new image loads before the new image itself

})(jQuery);

//=============================
//===== CarouFredSel Horizontal
//=============================

jQuery(function($) {
//  Carousel direction vertical
	$('#foo3').carouFredSel({
		height : "100%",
		auto: false,
		direction : "up",
		items	: 4,
		swipe       : {
				onTouch : true
		},
		prev	: {
			button	: "#prev3",
			key		: "left",
			items	:2
		},
		next	: {
			button	: "#next3",
			key		: "right",
			items	:2
		}
	});

//=============================
//=====   Fancybox
//=============================
	
	// Initialize the Lightbox for any links with the 'fancybox' class
	$(".fancybox").fancybox();
	// Initialize the Lightbox automatically for any links to images with extensions .jpg, .jpeg, .png or .gif
	$("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox(
	{
	padding : 5
	});
	
	// Initialize the Lightbox and add rel="gallery" to all gallery images when the gallery is set up using  so that a Lightbox Gallery exists
	$(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel','gallery').fancybox();
	// Initalize the Lightbox for any links with the 'video' class and provide improved video embed support
	$(".video").fancybox({
		fitToView       : false,
		width           : '70%',
		height          : '70%',
		autoSize        : false,
		closeClick      : false,
		openEffect      : 'none',
		closeEffect     : 'none',
		helpers : {
					media : {}
				}
	});

	$('#block-savoir-plus--button').on('click', function () {
		$('.block-savoir-plus--content').toggleClass('block-savoir-plus--active');
	});
});

//========================
//  Flexslider Home
//========================
jQuery(window).load(function(){
	jQuery(".flexslider-home").flexslider({
		animation:"slide",
		directionNav: false,
		controlNav: false,
		start:function(){
			jQuery(".index").find(".flexslider-wrapper-home").removeClass("loading");
		}
	});
});
