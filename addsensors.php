<?php
 require('user_manager.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Orange Sensors</title>
  <meta charset="utf-8">
  <style>
    #map {
      width: 100%;
      height: 500px;
    }
  </style>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>
  <script>

function initialize() {
  var myLatLng = new google.maps.LatLng(51.524636, -0.132036);

  var mapOptions = {
    zoom: 15,
    center: myLatLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById('map'),
      mapOptions);

  var marker = new google.maps.Marker({
    position: myLatLngng,
    map: map,
    title: 'Set lat/lon values for this property',
    draggable: true
  });

  google.maps.event.addListener(map, 'zoom_changed', function() {
    var zoomLevel = map.getZoom();
    map.setCenter(myLatLng);
    infowindow.setContent('Zoom: ' + zoomLevel);
  });

google.maps.event.addListener(map, "idle", function() {
        marker.setPosition(map.getCenter());
        document.getElementById("latin").innerHTML = map.getCenter().lat().toFixed(6);
        document.getElementById("lngin").innerHTML = map.getCenter().lat().toFixed(6);
      });
      google.maps.event.addListener(marker, "dragend", function(mapEvent) {
        map.panTo(mapEvent.latLng);
      });


google.maps.event.addListener(marker, 'dragend', function(a) {
  document.getElementById("map-output").innerHTML = "Latitude:  " + map.getCenter().lat().toFixed(6) + "<br>Longitude: " + map.getCenter().lng().toFixed(6) + "<a href='https://www.google.com/maps?q=" + encodeURIComponent(map.getCenter().toUrlValue()) + "' target='_blank'>Go to maps.google.com</a>";
  console.log(a);
  // bingo!
  // a.latLng contains the co-ordinates where the marker was dropped
});

google.maps.event.addDomListener(window, 'load', initialize);
}
  </script>
</head>


<body onload="initialize()">

<?php
if(!LoggedIn()) { ?>
    <h4>You must be logged in to add sensors. Click <a href="index.php">here</a> to log in.</h4><?php
} else {
?>

<h1>Add new sensors</h1>
<h3>Log in!</h3>
<form name="addsensor" method="post" action="sensor_manager.php" id="addsensor" novalidate>
  <label for="application">Sensor Application</label>
  <input name="application" id="application" type="text" placeholder="Label your sensor">
  <label for="measures">What does the sensor measure?</label>
  <select name="measures" id="measures" style="width: 350px">
    <option value="" selected disabled>Choose a property</option>
    <option value="acceleration">Acceleration</option>
    <option value="audio">Audio</option>
    <option value="distance">Distance</option>
    <option value="humidity">Humidity</option>
    <option value="light">Light Intensity</option>
    <option value="pressure">Pressure (all)</option>
    <option value="radiation">Radiation</option>
    <option value="rainfall">Rainfall</option>
    <option value="temperature">Temperature</option>
    <option value="windspeed">Windspeed</option>
  </select>
  <!-- TODO: make this intelligent with JQuery -->
  <label for="unit">Which unit will the data have?</label>
  <select name="unit" id="unit" style="width: 350px">
    <option value="" selected disabled>Choose a unit</option>
    <option value="none">none</option>
    <option value="mm">Millimetres</option>
    <option value="cm">Centimetres</option>
    <option value="m">Metres</option>
    <option value="mph">Miles per hour</option>
    <option value="kmph">Kilometers per hour</option>
    <option value="mps">Meters per second</option>
    <option value="mps2">Meters per second squared</option>
    <option value="dB">Decibels</option>
    <option value="C">Celcius</option>
    <option value="F">Fahrenheit</option>
    <option value="K">Kelvin</option>
  </select>
    <!-- TODO: click on google map and have this auto-filled -->

  <label for="lat">Latitude</label>
  <input name="lat" id="latin" type="number" step="0.000001" placeholder="Lat">
  <label for="lng">Longitude</label>
  <input name="lng" id="lngin" type="number" step="0.000001" placeholder="Lng">
  <button type="submit" name="add">Register this sensor</button>
</form>
    <div id="map">
    </div>
<?php
} ?>
<a href="index.php">Home</a>
</body>
</html>