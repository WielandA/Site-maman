/*
	Submenu
*/
var slideTimeout = 700,
	slideDuration = 450,
	timeoutid,
	subnavShown = false;
	

$('.subnavLink').hover(function(){
	var $submenu = $(this).children('.sub-menu');
	
	if (!subnavShown){
		timeoutid = setTimeout(function(){
			showSubnav($submenu)
		}, slideTimeout);
	}
}, function(){
	var $submenu = $(this).children('.sub-menu');
	
	clearTimeout(timeoutid);
  	
  	if (subnavShown){
  		hideSubnav($submenu);
	}
});

function showSubnav(el){
	el.slideDown(slideDuration);
	subnavShown = true;
}

function hideSubnav(el){
	subnavShown = false;
	el.slideUp(slideDuration);
}

/*
	// Slide out submenu on click if .subnavLink is not a real link
	$('.subnavLink').click(function(){
		var $submenu = $(this).next('.sub-menu');
	
		subnavShown ? hideSubnav($submenu) : showSubnav($submenu) ;
	});
*/