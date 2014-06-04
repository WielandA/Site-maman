/*
	Email link protection
*/
$('a.emaillink').each(function(){
	var hrefAttr = $(this).attr('href'),
		linkText = $(this).text();
		
	hrefAttr = transform(hrefAttr);
	linkText = transform(linkText);
	
	$(this).attr('href', 'mailto:'+ hrefAttr);
	$(this).text(linkText);
});

function transform(str){
	str = str.replace('(at)', '@').replace(/\(dot\)/g, '.');
	
	return str;
};


/*
	Scroll to top
*/
$('#totoplink').hide();

$(window).scroll(function(){
	var threshold = 200,
		$window = $(this);

	if ($window.scrollTop() > threshold){
		$('#totoplink').fadeIn('slow');
	} else if ($window.scrollTop() < threshold){
		$('#totoplink').fadeOut('slow');
	}
});

$('#totoplink').localScroll();