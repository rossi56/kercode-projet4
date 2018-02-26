function initMap() {
    var anchorage = {lat:  61.1862146, lng:-149.8082689};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: anchorage
    });
    var marker = new google.maps.Marker({
      position: anchorage,
      map: map,
      icon:'../img/marker.png',
      scrollwheel: false
    });
  }

  initMap();
