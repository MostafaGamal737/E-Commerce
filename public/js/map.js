function initialize() {
    var myLatlng = new google.maps.LatLng(24.711605, 46.699757);
    var mapOptions = {
        zoom: 10,
        center: myLatlng
    }
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        draggable:true,
        title:"Drag me!"
    });


    var searchBox=new google.maps.places.SearchBox(document.getElementById('searchmap'));
    google.maps.event.addListener(searchBox,'places_changed',function(){

      var places=searchBox.getPlaces();
      var bounds = new google.maps.LatLngBounds();
      var i , place ;
      for (i=0; place=places[i]; i++) {
        bounds.extend(place.geometry.location);
        marker.setPosition(place.geometry.location);
      }
    map.fitBounds(bounds);
    map.setZoom(15);

  });
    google.maps.event.addListener(marker,'position_changed',function(){

    var lat=marker.getPosition().lat();
    var lng=marker.getPosition().lng();

   $('#lat').val(lat);
   $('#lng').val(lng);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
