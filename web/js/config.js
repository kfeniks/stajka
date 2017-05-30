// set-bx
jQuery(document).ready(function($) {
	$(document).ready(function(){
 	 $('.banner-slider').bxSlider({
		controls: false,
		mode: 'fade',
		speed: 1500,
		auto: true,
		pause: 5000,
		autoControls: false,
		slideWidth: 1420,
		minSlides: 1,
		maxSlides: 1,
		moveSlides: 1,
		slideMargin: 0,
		pager: true	
 	 });
	});
});
	
	$(document).ready( function() {
		
		
 
		
		/* ---------------------------------------------------------------------- */
		/*	Ini oneByOne Banner
		/* ---------------------------------------------------------------------- */	
        $("#banner").oneByOne({													// the wrapper's name	
			className: 'oneByOne1',	             								// the wrapper div's class name of each slider	
			/* Please provide the width and height in the responsive 
			version, for the slider will keep the ratio when resize 
			depends on these size. */
			pauseByHover: true,													// pause the auto delay slideshow when user hover		
			width: 1100,															// width of the slider		
			height: 286,														// height of the slider		
			easeType: 'random',													// will override effect if you don't pre-defined it in the element
			delay: 300,  														// the delay of the touch/drag tween	
			tolerance: 0.25, 													// the tolerance of the touch/drag
			slideShow: true,													// auto play the slider or not		
			slideShowDelay: 3000,												// the delay millisecond of the slidershow	
			responsive: true,													// slider's size with the media query in CSS
			minWidth: 200														// text is hidden at this width
		});  
		
		$('.oneByOne1, #banner .oneByOne_item, #slide-wrapper, #exampleline').width($(window).width());
		/*end oneByOne*/ 
		 
		

	});
	
	/* end Window.load functions */





