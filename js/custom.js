(function($) {
	
// Smooth scroll:
$('a[href*="#"]')
	.not('[href="#"]')
	.not('[href="#0"]')
	.click(function(event){
		if(
			location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
			&& 
			location.hostname == this.hostname
		){
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			
			if(target.length){
				event.preventDefault();
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000, function(){
					var $target = $(target);
					$target.focus();
					if($target.is(":focus")){
						return false;
					} else{
						$target.attr('tabindex','-1');
						$target.focus();
					};
				});
			}
		}
});
    
// Code for displaying the choice amount
$(document).ready(function(){
	//Initial state of the content.
	var amount = wpglobals.smallPrice;
	$(".price-amount").html(amount);

	// Clicks on each tab will change to the new price as long as it isn't active.
	$('a[href="#choice-small"]').on('click', function(){
		if(amount != wpglobals.smallPrice){ 
			amount = wpglobals.smallPrice;
			$(".price-amount").html(amount);
		}
		else{};
	});

	$('a[href="#choice-medium"]').on('click', function(){
		if(amount != wpglobals.mediumPrice){ 
			amount = wpglobals.mediumPrice; 
			$(".price-amount").html(amount);
		}
		else{};
	});

	$('a[href="#choice-large"]').on('click', function(){
		if(amount != wpglobals.largePrice){ 
			amount = wpglobals.largePrice; 
			$(".price-amount").html(amount);
		}
		else{};
	});

});
	
// Code to move to form on click and also to change the field content of the price field in form.
// Look at moderntkontorshotell :)

$(document).ready(function(){
	$('#package-contact input').attr('readonly', true);
	$('.share-links').hide(this);
});

// Functions that replaces the content of the package input in the form with the desirable amount.
function virtualPack(){
	var inputTitle = $('.content-virtuellt h3').html();
	var inputPrice = $('.content-virtuellt .price-simple p').html();
	$('#input-package').val(inputTitle);
	$('#input-price').val(inputPrice);
};
	
function egetKontorPack(){
	var inputTitle = $('.content-eget-kontor h3').html();
	var inputPrice = $('.content-eget-kontor .price-choice p').html().replace('<span class="price-amount">', '').replace('</span>', '');
	$('#input-package').val(inputTitle);
	$('#input-price').val(inputPrice);
};

function oppetLandskapPack(){
	var inputTitle = $('.content-oppet-landskap h3').html();
	var inputPrice = $('.content-oppet-landskap .price-simple p').html();
	$('#input-package').val(inputTitle);
	$('#input-price').val(inputPrice);	
}

// Click handlers that will run above code if the button/link is clicked.
$('#packages-mobile .virtuellt-btn').on('click', function(e){
	virtualPack();
});
$('#packages-desktop .virtuellt-btn').on('click', function(e){
	virtualPack();
});
$('#packages-mobile .eget-kontor-btn').on('click', function(e){
	egetKontorPack();
});
$('#packages-desktop .eget-kontor-btn').on('click', function(e){
	egetKontorPack();
});
$('#packages-mobile .oppet-landskap-btn').on('click', function(e){
	oppetLandskapPack();
});
$('#packages-desktop .oppet-landskap-btn').on('click', function(e){
	oppetLandskapPack();
});

// Code for google map:

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var customMapStyle = [
		{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#e9e9e9"
				},
				{
					"lightness": 17
				}
			]
		},
		{
			"featureType": "landscape",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#f5f5f5"
				},
				{
					"lightness": 20
				}
			]
		},
		{
			"featureType": "road.highway",
			"elementType": "geometry.fill",
			"stylers": [
				{
					"color": "#ffffff"
				},
				{
					"lightness": 17
				}
			]
		},
		{
			"featureType": "road.highway",
			"elementType": "geometry.stroke",
			"stylers": [
				{
					"color": "#ffffff"
				},
				{
					"lightness": 29
				},
				{
					"weight": 0.2
				}
			]
		},
		{
			"featureType": "road.arterial",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#ffffff"
				},
				{
					"lightness": 18
				}
			]
		},
		{
			"featureType": "road.local",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#ffffff"
				},
				{
					"lightness": 16
				}
			]
		},
		{
			"featureType": "poi",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#f5f5f5"
				},
				{
					"lightness": 21
				}
			]
		},
		{
			"featureType": "poi.park",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#dedede"
				},
				{
					"lightness": 21
				}
			]
		},
		{
			"elementType": "labels.text.stroke",
			"stylers": [
				{
					"visibility": "on"
				},
				{
					"color": "#ffffff"
				},
				{
					"lightness": 16
				}
			]
		},
		{
			"elementType": "labels.text.fill",
			"stylers": [
				{
					"saturation": 36
				},
				{
					"color": "#333333"
				},
				{
					"lightness": 40
				}
			]
		},
		{
			"elementType": "labels.icon",
			"stylers": [
				{
					"visibility": "off"
				}
			]
		},
		{
			"featureType": "transit",
			"elementType": "geometry",
			"stylers": [
				{
					"color": "#f2f2f2"
				},
				{
					"lightness": 19
				}
			]
		},
		{
			"featureType": "administrative",
			"elementType": "geometry.fill",
			"stylers": [
				{
					"color": "#fefefe"
				},
				{
					"lightness": 20
				}
			]
		},
		{
			"featureType": "administrative",
			"elementType": "geometry.stroke",
			"stylers": [
				{
					"color": "#fefefe"
				},
				{
					"lightness": 17
				},
				{
					"weight": 1.2
				}
			]
		}
	];
	
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		styles		: customMapStyle
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	var customIcon = wpglobals.iconURL;

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
		icon		: customIcon
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});
	
// Share buttons hide and show code.
$(document).ready(function(){
	$('.share-links').hide(this);
});
	
$('.share-toggle').on('click', function(event){
	event.preventDefault();
	$('.share-links').toggle(this);
});

})(jQuery);