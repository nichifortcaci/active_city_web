
var combat = '';
$( document ).ready( function() {
	var g_lat = '';
	var g_lon = '';

	//$('.bs_datetime').bootstrapMaterialDatePicker();
	$('#feed-start_datetime, #feed-end_datetime').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD HH:mm', minDate : new Date() });

	//Google Maps JS
	//Set Map
	function initialize() {

		//$(".select").dropdown({"optionClass": "withripple"});
		

		var myLatlng = new google.maps.LatLng(g_lat,g_lon);
		var imagePath = 'http://iconshow.me/media/images/Application/Map-Markers-icons/png/32/MapMarker_PushPin2__Pink.png';
		var mapOptions = {
			zoom: 12,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}

		var map = new google.maps.Map(document.getElementById('map'), mapOptions);
		//Callout Content
		var contentString = 'Pozitia';
		//Set window width + content
		var infowindow = new google.maps.InfoWindow({
			content: contentString,
			maxWidth: 500
		});

	 //Add Circle
		var Circle = new google.maps.Circle({
			strokeColor: '#303F9F',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#3F51B5',
			fillOpacity: 0.35,
			map: map,
			center: myLatlng,
			radius: 3000
		});
		//Add Marker
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			icon: imagePath,
			title: 'image title'
		});

		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
		});
		google.maps.event.addListener(map, "click", function (e) {
			var latLng = e.latLng;
			setPagell({lat:e.latLng.lat(),lng:e.latLng.lng()});
			combat = e;
			console.log()
			Circle.setCenter(latLng);
			marker.setPosition(latLng);
		});
		google.maps.event.addListener(Circle, "click", function (e) {
			var latLng = e.latLng;
			setPagell({lat:e.latLng.lat(),lng:e.latLng.lng()});
			Circle.setCenter(latLng);
			marker.setPosition(latLng);
		});

		//Resize Function
		google.maps.event.addDomListener(window, "resize", function() {
			var center = map.getCenter();
			google.maps.event.trigger(map, "resize");
			map.setCenter(center);
		});
	}


	$.get('http://ip-api.com/json/',function(data){
		g_lat = data.lat;
		g_lon = data.lon;
		console.log('he')
		google.maps.event.addDomListener(window, 'load', initialize);
	})

	function setPagell(str){
		var ll = JSON.stringify(str);
		$('#location').val(ll);
	}
});