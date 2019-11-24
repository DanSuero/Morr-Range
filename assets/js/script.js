$(document).ready(function(){
    if($('.first-gal-img').length){
        if($('.image-gallery').length){
            var grabFullImg = $('.image-gallery li').eq(0).find('a').attr('href');
            $('.first-gal-img').css('background-image','url("'+grabFullImg+'")');
        }
    }
	if($('.tribe-events-calendar').length){
		if( window.innerWidth < 768 ){
			$('th').each(function(){
				var abbr = $(this).attr('data-day-abbr');
				$(this).html(abbr.charAt(0));
			});
		}
	}
    $(".menu-item").mouseenter(function(){
        $(".dropdown-toggle",this).dropdown('toggle');
    }).mouseleave(function(){
        $(".dropdown-toggle",this).dropdown('toggle');
    });
    
});