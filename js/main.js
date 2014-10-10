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
