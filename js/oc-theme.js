(function($) {
	wow = new WOW( {
	boxClass:	 'wow',
	animateClass: 'animated',
	offset:		 100
	}
	);
	wow.init();
	
	$( document ).ready(function() {

		var arr = []
		$(document).on('change', '.check-input', function () {
			if($(this).is(":checked")){
				arr.push($(this).val());
			}else{
				const index = arr.indexOf($(this).val());
				if (index > -1) {
				  arr.splice(index, 1);
				}
			}
			var vals = arr.join(", ");
			$('#checkitem').val(vals);
		})
		

		$(document).on('click', '.blog-item.book-item', function () {
			
			var all_data = gBooks;
			console.log(all_data);
			var template = $('#modal-template');
			var html = template.html();
			var book_id = $(this).attr("data-book");
			var modal_data = all_data[book_id];
			html = html.replace(/__TITLE__/g, modal_data.title);
			html = html.replace(/__PUBLISHER__/g, modal_data.publisher);
			html = html.replace(/__DESC__/g, modal_data.description);
			html = html.replace(/__LINK___/g, modal_data.link);
			html = html.replace(/__IMGURL__/g, modal_data.img_url);
  			console.log( "ID = " + book_id);
			console.log( "NEW HTML: ", html);
			$('#modal-body').html(html);
		});


		$("#cate-selector").change(function(){

		    var val = $(this).val();
		    window.location.href = val;

		 });
		
		console.log( "This is js/oc-theme.js" );
	});
	$( window ).load(function() {
// 1399.98px
// 1199.98px
// 991.98px
// 767.98px
// 575.98px
		const swiper = new Swiper('.swiper', {
			slidesPerView: 3.4,
			centeredSlides: true,
			loop: true,
			speed: 400,
			spaceBetween: 10,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 1.4,
					spaceBetween: 20
				},
				// when window width is >= 640px
				1200: {
					slidesPerView: 3.4,
					spaceBetween: 10
				}
			}
		});
	});

	$(window).load(function(){
	var setSpace = $('header').innerHeight();
	// $('.header-space').height(setSpace);

	$('.burger-icon').click(function(){
	    var setSpace = $('header').innerHeight();
	    $('.mobile-menu').css('top',setSpace);
	    $('.mobile-menu').slideToggle(300);
	    $(this).toggleClass('open');

	});
	});
	$(window).resize(function(){
	var setSpace = $('header').innerHeight();
	// $('.header-space').height(setSpace);
	$('.mobile-menu').css('top',setSpace);

	var WW = $(window).width();
	if(WW>767){
	  $('.burger-icon').removeClass('open');
	  $('.mobile-menu').slideUp(300);
	  $('.mobile-menu').css('top',setSpace);
	}else{
	  $('.mobile-menu').css('top',setSpace);
	}
	});

	$(window).scroll(function(){
	var setSpace = $('header').innerHeight();
	var WC = $(window).scrollTop();
	if(WC>150){
	  $('header').addClass('header-scroll');
	}else{
	  $('header').removeClass('header-scroll');
	}
	$('.burger-icon').removeClass('open');
	$('.mobile-menu').slideUp(300);
	// $('.mobile-menu').css('top',setSpace);
	});


}(jQuery));

function google_maps_callback() {
	console.log( "This is google_maps_callback()" );
	var mapDiv = $('#map');
	var zoom = mapDiv.attr('data-zoom') * 1;
	var latitude = mapDiv.attr('data-latitude');
	var longitude = mapDiv.attr('data-longitude');
	var addrLatLong = new google.maps.LatLng(latitude, longitude);

	var mapOptions = {
		zoom: zoom,
		center: addrLatLong,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		streetViewControl: false,
		zoomControl: true,
		mapTypeControl: false,
		panControl: false,
		scrollwheel: false,
	};

	var mapCanvas = document.getElementById('map');
	map = new google.maps.Map(mapCanvas, mapOptions);

	var markerpin = new google.maps.Marker({
		map: map,
		position: addrLatLong,
		animation: google.maps.Animation.DROP
	});
}
