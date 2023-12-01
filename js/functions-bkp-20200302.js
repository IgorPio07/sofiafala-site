(function ($) {

// var slider = $('.bxslider').bxSlider({
// 		auto: 'true',
//     mode: 'vertical'
// });

$('#reload-slider').click(function(e){
  e.preventDefault();
  slider.reloadSlider({
    mode: 'fade',
    auto: true,
    pause: 1000,
    speed: 500
  });
});

jQuery(document).ready(function($){
	$('.slider').bxSlider({
      auto: true,
      mode: 'fade',
			slideWidth: 300
	});
});

jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top - 100 }, 800);
	 });
});

        $(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
			} else {
				$('.scrollup').fadeOut();
			}
		});
		$('.scrollup').click(function(){
			$("html, body").animate({ scrollTop: 0 }, 1000);
				return false;
		});

	 wow = new WOW({}).init();

    // //Google Map
    // var get_latitude = $('#google-map').data('latitude');
    // var get_longitude = $('#google-map').data('longitude');
    //
    // function initialize_google_map() {
    //     var myLatlng = new google.maps.LatLng(get_latitude, get_longitude);
    //     var mapOptions = {
    //         zoom: 14,
    //         scrollwheel: false,
    //         center: myLatlng
    //     };
    //     var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
    //     var marker = new google.maps.Marker({
    //         position: myLatlng,
    //         map: map
    //     });
    // }
    // google.maps.event.addDomListener(window, 'load', initialize_google_map);

})(jQuery);
