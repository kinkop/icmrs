$(function(){

    var mapOptions = {
        center: { lat: venueMapLat, lng: venueMapLng},
        zoom: 13
    };
    var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);


    var latLng = new google.maps.LatLng(venueMapLat, venueMapLng);


    var marker = new google.maps.Marker({
        position: latLng,
        map: map
    });


});